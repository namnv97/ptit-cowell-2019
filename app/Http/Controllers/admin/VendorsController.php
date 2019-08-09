<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Model\Vendors;
use App\Http\Requests\StoreCreateVendor;

class VendorsController extends Controller
{
    public $_data = [];

    public function index(Request $rq)
    {
        if(empty($rq->s)):
            $vendors = Vendors::paginate(5);
            $this->_data['vendors'] = $vendors;
        else:
            $vendors = Vendors::where('name','like',"%$rq->s%")->paginate(5);
            $vendors->withPath("?s=$rq->s");
            $this->_data['vendors'] = $vendors;
        endif;
        $this->_data['head_title'] = 'Danh sách nhà sản xuất';
        return view('admin.vendors.index',$this->_data);
    }

    public function create()
    {
        $this->_data['head_title'] = "Thêm nhà sản xuất";
        return view('admin.vendors.create',$this->_data);
    }

    public function save(StoreCreateVendor $rq)
    {
        $vendor = new Vendors();
        $vendor->name = $rq->name;
        $vendor->description = $rq->description;
        $vendor->save();

        return redirect()->route('admin.vendors.index')->with('done','Thêm nhà sản xuất thành công');
    }

    public function edit($id=null)
    {
        if($id == null) return back();

        $vendor = Vendors::find($id);

        if(empty($vendor)) return back();

        $this->_data['vendor'] = $vendor;

        return view('admin.vendors.edit',$this->_data);
    }

    public function update(Request $rq)
    {
        $id = $rq->id;
        if($id == null)
        {
            return back()->withInput()->with('msg','Thiếu ID');
        }

        $vendor = Vendors::find($id);

        if(empty($vendor))
        {
            return back()->withInput()->with('msg','Nhà sản xuất không tồn tại');
        }

        $vendor->name = $rq->name;
        $vendor->description = $rq->description;
        $vendor->save();

        return redirect()->route('admin.vendors.index')->with('done','Cập nhật nhà sản xuất thành công');
    }

    public function delete($id=null)
    {
        if($id == null) return back();

        $vendor = Vendors::find($id);

        if(empty($vendor)) return back();

        // $vendor->delete();

        return redirect()->route('admin.vendors.index')->with('delete','Đã xóa nhà sản xuất '.$vendor->name);
    }
}
