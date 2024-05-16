<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //Admin Login Page
    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:12|min:4'
        ]);

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if(Auth::guard('admin')->user()->role != 'admin'){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','Only Admin Roles');
                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with('error','Email or password incorrect');
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }


    public function logOut(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
