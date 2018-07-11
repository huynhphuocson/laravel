<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\User;



class LoginController extends Controller
{
    // lấy giao diện ra
    public function getLogin(){
        if (!Auth::check()){
            return view('admin.login.login');
        } else{
            return redirect('psh_admin');
        }

        return view('admin.login.login');
    }

    //kiểm tra đăng nhập
    public function postLogin(LoginRequest $request){
        $login = [
            'username' => $request->txtUser,
            'password' => $request->txtPass,
            'level'    => 1
        ];
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect('psh_admin');
        } else {
            return redirect()->back();
        }
    }

    //đăng xuất
    public function getLogout (){
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
