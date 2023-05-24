<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function registerGet()
    {
        return view('auth.user_auth.user_register');
    }

    public function registerPost(UserRegisterRequest $request)
    {
        dd($request->name);
    }

    public function loginGet()
    {
        # code...
    }

    public function loginPost()
    {
        # code...
    }

    public function logout()
    {
        # code...
    }
}
