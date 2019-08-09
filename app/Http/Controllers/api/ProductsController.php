<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use \File;

use App\Model\Products;
use App\Model\Categories;

class ProductsController extends Controller
{
    public function create(Request $rq)
    {
        $vali = Validator::make(
            $rq->all(),
            [
                'name' => 'required',
                'price' => 'required|numeric|min:1',
                'quantity' => 'required|numeric|min:1'
            ],
            [
                'required' => ':attribute không được để trống',
                'numeric' => ':attribute phải là số',
                'min' => ':attribute tối thiểu là :min'
            ],
            [
                'name' => 'Tên sản phẩm',
                'price' => "Giá sản phẩm",
                'quantity' => 'Số lượng'
            ]
        );

        if ($vali->fails()) {
            $msg = '<div class="alert alert-warning">';
            foreach ($vali->errors()->all() as $er) {
                $msg .= '<p>' . $er . '</p>';
            }

            $msg .= '</div>';
        } else {
            $msg = '<div class="alert alert-success">Thành công</div>';
        }

        return response()->json(['msg' => $msg]);
    }

    public function store(Request $rq)
    {
        $vali = Validator::make(
            $rq->all(),
            [
                'name' => 'required',
                'vendor_id' => 'required|min:1',
                'price' => 'required',
                'quantity' => 'required|min:1',
                'cate_id' => 'required|min:1',
                'image' => 'required',
                'description' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute tối thiểu là :min'
            ],
            [
                'name' => 'Tên sản phẩm',
                'vendor_id' => 'Hãng sản xuất',
                'price' => 'Giá sản phẩm',
                'quantity' => 'Số lượng sản phẩm',
                'cate_id' => 'Danh mục sản phẩm',
                'image' => 'Ảnh sản phẩm',
                'description' => 'Mô tả sản phẩm'
            ]
        );

        if ($vali->fails()) {
            $msg = '<div class="alert alert-warning">';
            foreach ($vali->errors()->all() as $er) {
                $msg .= '<p>' . $er . '</p>';
            }
            if($rq->image == 'undefined')
            {
                $msg .= '<p>Ảnh sản phẩm không được để trống</p>';
            }
            $msg .= '</div>';
        } else {
            $file = $rq->image;
            $format = $rq->image->extension();

            $name = $file->getClientOriginalName();
            $name = preg_replace('/\.(.*)$/', '_' . time() . '.$1', $name);

            $path = '/cowell/uploads/images/'.$name;

            $file->move(public_path('cowell/uploads/images'), $name);

            $product = new Products();

            $fill = $rq->only('name','price','description','quantity','vendor_id','cate_id');
            $fill['image'] = $path;
            $fill['slug'] = str_slug($rq->name);

            foreach($fill as $field => $value)
            {
                $product->$field = $value;
            }

            $product->save();

            $msg = '<div class="alert alert-success">Thêm thành công</div>';
        }



        return response()->json(['msg' => $msg]);
    }

    public function show()
    {
        $products = Products::orderBy('id', 'desc')->select('id', 'name','slug', 'price', 'image', 'quantity')->get()->toArray();
        return response()->json(['products' => $products]);
    }
}
