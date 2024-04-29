<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\client;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $categories = Category::take(3)->get();
        $cars = car::all();
        return view('client.home', compact('categories', 'cars'));
    }


    public function cars(){
        $categories = Category::all();
        $cars = car::all();
        // dd($cars);
        $clientId = Auth::user()->clients()->first()->id;
        // dd($clientId);
        return view('client.cars', compact('categories', 'cars', 'clientId'));  
    }

    public function singleCar($carId){
        $car = Car::findOrFail($carId);
        $clientId = Auth::user()->clients()->first()->id;
        return view('client.singleCar', compact('car', 'clientId'));      
    }


    public function reservation(){
        $PaidReservations = Reservation::where('status', 1)->get();
        $NotPaidReservations = Reservation::where('status', 0)->get();

        return view('client.reservationHistory', compact('PaidReservations','NotPaidReservations'));
    }


    public function search(Request $request)
    {
        $query = $request->input('search'); 
        $type = $request->input('post_type'); 
    
        $postsQuery = car::query();
        if ($query) {
            $postsQuery->where('title', 'like', "%$query%")
                       ->orWhereHas('category', function ($categoryQuery) use ($query) {
                            $categoryQuery->where('name', 'like', "%$query%");
                        })
                       ->orWhereHas('tags', function ($tagQuery) use ($query) {
                            $tagQuery->where('name', 'like', "%$query%");
                        });
        }
        if ($type) {
            $postsQuery->where('type', $type);
        }
    
        $posts = $postsQuery->with('user', 'category', 'tags')->get();
    
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclientRequest $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        //
    }
}
