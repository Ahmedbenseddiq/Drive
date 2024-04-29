<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Client;
use App\DTO\LoginDto;
use App\DTO\RegisterDto;
use App\Models\Operator;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository  implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */


     public function register(RegisterDto $registerDto){

        $fileName = pathinfo($registerDto->image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $registerDto->image->getClientOriginalExtension();
        $fullFileName = $fileName . "-" . time() . '.' . $extension;
    
        $destinationPath = public_path('assets/uploads/');
    
        $registerDto->image->move($destinationPath, $fullFileName);
    
        $insert  = $this->getArray($registerDto) + ['image' => $fullFileName];
    
        $user = User::create($insert);
    
        if ($registerDto->role === 'client') {
            $client = Client::create(['user_id' => $user->id]); 
        } else if ($registerDto->role === 'operator') {
            $operator = Operator::create(['user_id' => $user->id]);
        } 
    
        return abort(redirect()->route('loginpage'));
    }
    
    private function getArray(RegisterDto $registerDto){
        return [
            'name' => $registerDto->name,
            'email' => $registerDto->email,
            'password' =>$registerDto->password,
            'role' => $registerDto->role,
        ];
    }
    


    public function login(loginDto $loginDto){
        
        $credentials = $this->getarr($loginDto);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            // dd($user);
            if ($user->restriction == 1) {
                // dd($user->restriction);
                return abort(redirect()->route('restricted'));
            }else{
                if ($user->role === 'admin') {
                    return abort(redirect()->route('admin.home'));
                } elseif ($user->role === 'client') {
                    return abort(redirect()->route('client.home'));
                } elseif ($user->role === 'operator') {
                    return abort(redirect()->route('operator.home'));
                }
            }
           
        }

        return abort(redirect()->route('loginpage')->withErrors(['error' => 'Incorrect email or password. Please try again.']));
    }

    public function getarr(loginDto $loginDto){
        return [
            'email' => $loginDto->email,
            'password' => $loginDto->password
        ];
    }

    public function logout()
    {
        Auth::logout();
        return abort(redirect()->route('welcome')->with('success', 'You have been logged out.'));
    }
        
}


