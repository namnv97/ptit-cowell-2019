<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Categories;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUpdateCategory;
use App\Http\Requests\StoreCreateCategory;

class CategoriesController extends Controller
{
    public function index(Request $rq)
    {
        if(empty($rq->s)):
            $categories = Categories::leftJoin('categories as ct','categories.parent_id','=','ct.id')->select('categories.*','ct.name as cat_name')->paginate(5);
            $this->_data['categories'] = $categories;
        else:
            $categories = Categories::leftJoin('categories as ct','categories.parent_id','=','ct.id')->select('categories.*','ct.name as cat_name')->where('categories.name','like',"%$rq->s%")->paginate(5);
            $categories->withPath("?s=$rq->s");
            $this->_data['categories'] = $categories;
        endif;
        $this->_data['head_title'] = 'Danh sách danh mục';
        return view('admin.categories.index',$this->_data);
    }

    public function create()
    {
        $cate = Categories::where('parent_id','=',0)->select('id','name')->get();
        $this->_data['cate'] = $cate;
        $this->_data['head_title'] = "Thêm danh mục";
        return view('admin.categories.create',$this->_data);
    }

    public function save(StoreCreateCategory $rq)
    {
        $cat = new Categories();

        $cat->name = $rq->name;
        $cat->slug = $rq->slug;
        $cat->description = $rq->description;
        $cat->parent_id = $rq->parent_id;

        $cat->save();
        return redirect()->route('admin.categories.index')->with('done','Thêm danh mục thành công');
    }

    public function edit($id = null)
    {
        if($id == null)
        {
            return redirect()->route('admin.categories.index');
        }

        $cate = Categories::find($id);

        if(empty($cate)) return redirect()->route('admin.categories.index');

        $this->_data['cate'] = $cate;
        $this->_data['head_title'] = "Cập nhật danh mục";
        $cates = categories::where('parent_id','=',0)->get();
        $this->_data['cates'] = $cates;
        return view('admin.categories.edit',$this->_data);
    }

    public function update(StoreUpdateCategory $rq)
    {
        $cate = Categories::find($rq->id);

        if(empty($cate)) return back()->with('msg','Danh mục không tồn tại');

        $cate->slug = $rq->slug;
        $cate->name = $rq->name;
        $cate->description = $rq->description;
        $cate->parent_id = $rq->parent_id;

        $cate->save();

        return redirect()->route('admin.categories.index')->with('done','Cập nhật danh mục thành công');
    }

    public function delete($id=null)
    {
        if($id == null) return back();

        $cat = Categories::find($id);
        if(empty($cat)) return back();

        $cat->delete();

        return redirect()->route('admin.categories.index')->with('delete','Đã xóa danh mục '.$cat->name);
    }
}
