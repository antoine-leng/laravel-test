<?php

namespace App\Http\Controllers;

use App\Models\Property; 
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function home()
    {
        $properties = Property::all();
        return view('home', compact('properties'));
    }
}
