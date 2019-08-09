<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Products;
use App\Model\Categories;
use App\Model\Users;
use App\Model\Vendors;

class AdminController extends Controller
{
    public $_data = [];

    public function index()
    {
        $users = Users::all()->count();
        $cates = Categories::all()->count();
        $products = Products::all()->count();
        $vendors = Vendors::all()->count();
        $this->_data['user'] = $users;
        $this->_data['cate'] = $cates;
        $this->_data['product'] = $products;
        $this->_data['vendor'] = $vendors;
        return view('admin.dashboard',$this->_data);
    }
}
