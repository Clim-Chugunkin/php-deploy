<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Watch;


class MyController extends Controller
{
    //
    public function index(){
        return "Hello world";
    }

    public function getAllUsers(){
        $query = User::query();
        
        $users=$query->get();
        return view('users',compact('users'));
    }

    public function home(){
        $watches = Watch::all();
        return view('home',compact('watches'));
    }
}
