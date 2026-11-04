<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       
        $users = User::all();

        
        return view('users', compact('users'));
    }

    public function task1(){
       $name = User::first();
       $array=[1,2,3,4,5];

       return view('test',compact('name','array'));
    //    return view('faqeeh')->with('name',$name);
    }
}