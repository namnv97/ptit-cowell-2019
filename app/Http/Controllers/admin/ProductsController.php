<?php

namespace App\Http\Controllers\admin;

// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\Model\Products;
use App\Model\Categories;
use App\Model\Vendors;
use App\Http\Requests\StoreCreateProduct;
use App\Http\Requests\StoreUpdateProduct;

class ProductsController extends Controller
{
    public $_data = [];


    public function index(Request $rq)
    {
        if (empty($rq->s)) :
            $products = Products::leftJoin('categories', 'products.cate_id', '=', 'categories.id')->leftJoin('vendors', 'products.vendor_id', '=', 'vendors.id')->select('products.*', 'categories.name as cat_name', 'vendors.name as vendor_name')->paginate(5);
            $this->_data['products'] = $products;
        else :
            $products = Products::leftJoin('categories', 'products.cate_id', '=', 'categories.id')->leftJoin('vendors', 'products.vendor_id', '=', 'vendors.id')->where('products.name', 'like', "%$rq->s%")->select('products.*', 'categories.name as cat_name', 'vendors.name as vendor_name')->paginate(5);
            $products->withPath("?s=$rq->s");
            $this->_data['products'] = $products;
        endif;
        $this->_data['head_title'] = 'Danh sách sản phẩm';
        return view('admin.products.index', $this->_data);
    }

    public function create()
    {
        $cates = Categories::where('parent_id', '=', 0)->get();
        $this->_data['cates'] = $cates;
        $vendors = Vendors::all();
        $this->_data['vendors'] = $vendors;
        $this->_data['head_title'] = "Thêm sản phẩm";
        return view('admin.products.create', $this->_data);
    }

    public function save(StoreCreateProduct $rq)
    {

        $product = new Products();

        $list = $rq->only(['name','slug','description','vendor_id','price','quantity','cate_id','image','sale_date_start','sale_date_end']);

        if (!empty($list['sale_date_start'])) {
            $list['sale_date_start'] = date_create_from_format('d/m/Y', $list['sale_date_start'])->format('Y-m-d');
        }

        if (!empty($list['sale_date_end'])) {
            $list['sale_date_end'] = date_create_from_format('d/m/Y', $list['sale_date_end'])->format('Y-m-d');
        }

        foreach ($list as $field => $value) {
            $product->$field = $value;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('done', 'Thêm sản phẩm thành công');
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return back();
        }

        $product = Products::find($id);
        if (empty($product)) {
            return back();
        }
        $this->_data['product'] = $product;
        $cates = Categories::where('parent_id', '=', 0)->get();
        $this->_data['cates'] = $cates;
        $vendors = Vendors::all();

        $cate_id = Categories::find($product->cate_id);

        $childs = Categories::where('parent_id', '=', $cate_id->parent_id)->get();
        $this->_data['parent_id'] = $cate_id->parent_id;
        $this->_data['childs'] = $childs;
        $this->_data['vendors'] = $vendors;
        $this->_data['head_title'] = "Cập nhật sản phẩm";
        return view('admin.products.edit', $this->_data);
    }

    public function update(StoreUpdateProduct $rq)
    {
        $id = $rq->id;
        if ($id == null) {
            return back()->with('msg', 'Thiếu ID');
        }

        $product = Products::find($id);
        if (empty($product)) {
            return back()->withInput()->with('msg', 'Sản phẩm không tồn tại');
        }
        
        $list = $rq->only(['name','slug','description','vendor_id','price','quantity','cate_id','image','sale_date_start','sale_date_end']);

        if (!empty($list['sale_date_start'])) {
            $list['sale_date_start'] = date_create_from_format('d/m/Y', $list['sale_date_start'])->format('Y-m-d');
        }

        if (!empty($list['sale_date_end'])) {
            $list['sale_date_end'] = date_create_from_format('d/m/Y', $list['sale_date_end'])->format('Y-m-d');
        }

        foreach ($list as $field => $value) {
            $product->$field = $value;
        }


        $product->save();

        return redirect()->route('admin.products.index')->with('done', 'Cập nhật sản phẩm thành công');
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return back();
        }

        $product = Products::find($id);

        $product->delete();

        return redirect()->route('admin.products.index')->with('delete', 'Đã xóa sản phẩm '.$product->name);
    }

    public function get_child_cate(Request $rq)
    {
        ob_start();
        $cates = Categories::where('parent_id', '=', $rq->id)->get();
        if (!empty($cates)) :
            foreach ($cates as $cat) :
                ?>
                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                <?php
            endforeach;
        endif;
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
        die();
    }
}


