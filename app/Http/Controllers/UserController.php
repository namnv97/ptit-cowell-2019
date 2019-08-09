<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePassword;

use Auth;
use Illuminate\Support\Facades\Hash;

use App\Model\Users;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $_data = [];

    public function profile()
    {
        return view('client.profile',$this->_data);
    }

    public function save(Request $rq)
    {
        $vali = Validator::make($rq->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Họ tên không được để trống'
            ]
        );

        if($vali->fails()) return back()->withInput()->withErrors($vali->errors()->all());

        $user = Users::find(Auth::user()->id);

        $user->name = $rq->name;

        $user->save();

        return redirect()->route('client.profile')->with('msg_update','Cập nhật thành công');
    }


    public function changepass()
    {
        $this->_data['head_title'] = 'Thay đổi mật khẩu';
        return view('client.changepass',$this->_data);
    }

    public function changepass_save(StoreUpdatePassword $request)
    {
        $oldpass = $request->oldpassword;
        $newpassword = $request->password;

        if(Hash::check($oldpass,Auth::user()->password))
        {
            $user = Users::find(Auth::user()->id);

            $user->password = Hash::make($newpassword);

            $user->save();

            Auth::logout();
            return redirect()->route('login');
        }
        else
        return back()->withInput()->withErrors('Mật khẩu cũ không chính xác');
    }
}
