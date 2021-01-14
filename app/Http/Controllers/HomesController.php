<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index()
    {
        $name = "Savira";
        return view('home', compact('name'));
    }
}
