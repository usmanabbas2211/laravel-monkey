<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function new(){
        return view('new');
    }
    public function welcome(){
        return view('welcome');
    }
}