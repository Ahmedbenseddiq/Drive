<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\Category;
use Illuminate\Http\Request;

class guestController extends Controller
{
    public function welcome(){
        $cars = car::all();
        $categories = Category::take(3)->get();
        return view('welcome', compact('cars','categories'));
    }

    public function cars(){
        $categories = Category::all();
        $cars = car::all();
        return view('/cars', compact('categories', 'cars'));  
    }
}
