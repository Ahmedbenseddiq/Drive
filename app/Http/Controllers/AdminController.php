<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\User;
use App\Models\admin;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'client')
        ->orWhere('role', 'operator')
        ->get();       
        
        $clientsCount = User::where('role', 'client')->count();
        $operatorsCount = User::where('role', 'operator')->count();
        $totalCars = car::count();
        $totalReservations = reservation::count();

    return view('admin.home', compact('users', 'clientsCount', 'operatorsCount','totalCars', 'totalReservations'));
    }


    public function Restriction(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $user->restriction = $user->restriction == 0 ? 1 : 0;

        $user->save();

        return redirect()->back()->with('success', 'User restriction toggled successfully.');
    }


}
