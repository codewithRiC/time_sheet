<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function about(){
        return view('about');
    }

    public function forgetpassword(){
        return view('forgetpassword');
    }

    public function resetpassword(){
        return view('resetpassword');
    }
}