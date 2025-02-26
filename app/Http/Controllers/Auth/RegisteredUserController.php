<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:Client,Agency'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        if ($request->role === 'Agency') {
            $user->status = 'pending'; 
        } else {
            $user->status = 'active'; 
        }

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        // dd(vars: $user->getRoleNames()->first());

        // switch ($user->getRoleNames()->first()) {
        //     case 'Agency':
        //         return $user->status === 'pending'
        //             ? redirect()->route('pending.agency.notice')  
        //             : redirect()->route('agency.dashboard');      
    
        //     case 'Client':
        //         return redirect()->route('client.dashboard');
    
        //     default:
        //         return redirect()->route('register');  
        // }
            
        return redirect(route('dashboard', absolute: false));
    }
}
