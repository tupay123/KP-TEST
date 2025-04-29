<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
       
        $foods = Food::paginate(6);
        return view('welcome', compact('foods'));
    }
}