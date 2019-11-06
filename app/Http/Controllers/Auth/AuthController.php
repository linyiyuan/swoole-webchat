<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('chat_room.login');
    }

    public function register()
    {
        return view('chat_room.register');
    }

    public function logout()
    {

    }
}
