<?php

namespace App\Http\Controllers;

use App\Models\User;
// use AuthUserService;
use App\Services\AuthUserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected $authUserSevice;

    public function __construct(AuthUserService $authUserSevice)
    {
        $this->authUserSevice = $authUserSevice;
    }

    //Show Login Page For Users
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        return $this->authUserSevice->login($request->only('email', 'password'));
    }

    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        return $this->authUserSevice->register($request->all());
    }

    public function logOut()
    {
        return $this->authUserSevice->logOut();
    }
}
