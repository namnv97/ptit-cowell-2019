<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    protected $_data = [];
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function Login()
    {
        $this->_data['head_title'] = 'Đăng nhập';
        return view('client.login',$this->_data);
    }

    public function PostLogin(Request $req)
    {
        if (Auth::guard()->attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::user()->roles < 5) {
                return redirect()->route('home')->with('login_success','Đăng nhập thành công');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withInput()->with('login_fail','Sai thông tin tài khoản');
        }
    }
}
