<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use App\Model\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //  login page
    public function showLogin()
    {
        return view('admin.auth.showLogin');
    }


    //  login
    public function login(AdminLoginRequest $request)
    {
        if (Auth::guard('admin')->attempt([
            'account' => $request ['account'],
            'password' => $request ['password'],
        ], $request->has('remember'))) {
            return redirect('admin/index')->with('success', '登录成功!');
        } else {
            $request->flash();
            return redirect()->back()->withInput()->with('error', '用户名或密码错误!');
        }
    }


    //  first page
    public function index()
    {
        session(['navSelect' => '']);
        session(['navFid' => '']);
        return view('admin.auth.index');
    }


    //  logout
    public function logout()
    {
        session(['navSelect' => '']);
        session(['navFid' => '']);
        Auth::guard('admin')->logout();

        return redirect('admin/login')->with('success', '登出成功!');
    }


}
