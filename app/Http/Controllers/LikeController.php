<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\like;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorelikeRequest;
use App\Http\Requests\UpdatelikeRequest;

class LikeController extends Controller
{


    public function like(car $car)
    {
        $like = new Like();
        $like->client_id = Auth::user()->clients()->first()->id;

        $car->likes()->save($like);
        
        $likeCount = $car->likes->count(); 
    
        return response()->json(['message' => 'Liked', 'likes_count' => $likeCount]);
    }
    
    public function unlike(car $car)
    {
        $car->likes()->where('client_id',Auth::user()->clients()->first()->id)->delete();
        
        $likeCount = $car->likes->count(); 
    
        return response()->json(['message' => 'Unliked', 'likes_count' => $likeCount]);
    }


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorelikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelikeRequest $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(like $like)
    {
        //
    }
}
