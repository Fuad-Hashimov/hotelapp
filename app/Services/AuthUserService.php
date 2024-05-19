<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthUserService
{
    public function login($user)
    {
        $validator = Validator::make($user, [
            'email' => 'required|email',
            'password' => 'required|max:12|min:4'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt($user)) {
                return redirect()->route('account.hotel');
            } else {
                return redirect()->route('account.login')->with('error', 'Email or password incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }
    public function register($newuser)
    {
        $validator = Validator::make($newuser, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $newuser['name'];
            $user->email = $newuser['email'];
            $user->password = Hash::make($newuser['password']);
            $user->role = 'customer';
            $user->save();

            return redirect()->route('account.login')
                ->with('success', 'Register success');
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
