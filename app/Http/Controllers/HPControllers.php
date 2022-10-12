<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HPControllers extends Controller
{
    public function index(){
        return view('hp');
    }
}
