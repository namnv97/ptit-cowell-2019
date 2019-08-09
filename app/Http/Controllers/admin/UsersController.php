<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Model\Users;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCreateUser;
use App\Http\Requests\StoreUpdateUser;


use Auth;

class UsersController extends Controller
{
    public $_data = [];

    public function __construct()
    { }

    public function index(Request $rq)
    {
        if (empty($rq->s)) :
            $users = Users::where('roles', '<', Auth::user()->roles)->paginate(15);
            $this->_data['users'] = $users;
        else :
            $users = Users::where([['name', 'like', "%$rq->s%"], ['roles', '<', Auth::user()->roles]])->paginate(15);
            $users->withPath("?s=$rq->s");
            $this->_data['users'] = $users;
        endif;
        $this->_data['head_title'] = 'Danh sách người dùng';
        return view('admin.users.index', $this->_data);
    }

    public function create()
    {
        $this->_data['head_title'] = 'Thêm người dùng';
        return view('admin.users.create', $this->_data);
    }

    public function save(StoreCreateUser $rq)
    {

        $model = new Users();
        $model->name = $rq->name;
        $model->email = $rq->email;
        $model->password = Hash::make($rq->password);
        $model->roles = $rq->roles;
        $model->save();

        return redirect()->route('admin.users.index')->with('done', 'Thêm người dùng mới thành công');
    }

    public function edit($id = null)
    {
        if ($id ==  null)
            return back();
        $user = Users::find($id);
        if (empty($user)) return back();
        $this->_data['user'] = $user;
        $this->_data['head_title'] = "Cập nhật thông tin người dùng";
        return view('admin.users.edit', $this->_data);
    }

    public function update(StoreUpdateUser $rq)
    {
        if ($rq->id == null) return back()->withInput();
        $user = Users::find($rq->id);

        if (empty($user)) return back()->withInput();

        if (!empty($rq->password)) {
            $user->password = Hash::make($rq->password);
        }
        $user->name = $rq->name;
        $user->roles = $rq->roles;
        $user->save();

        return redirect()->route('admin.users.index')->with('done', 'Cập nhật người dùng thành công');
    }

    public function delete($id = null)
    {
        if ($id == null) return back();

        $user = Users::find($id);

        if (empty($user)) return back();

        // $user->delete();

        return redirect()->route('admin.users.index')->with('delete', 'Đã xóa người dùng ' . $user->name);
    }
}
