<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use DB;
// use Auth;


use App\Model\Products;
use App\Model\Cart_items;
use App\Model\Options;
use App\Model\Categories;
use App\Model\Users;

class ApiController extends Controller
{
    public function test()
    {
        header('Content-Type: application/json');
        $products = Products::select('id', 'name', 'slug', 'image', 'quantity', 'price')->orderBy('id', 'desc')->get()->toArray();
        foreach ($products as $key => $product) {
            $products[$key]['image'] = 'http://localhost:8000' . $product['image'];
            $products[$key]['price'] = number_format($product['price']) . 'VND';
        }
        return json_encode($products);
    }

    public function add_product(Request $rq)
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

    public function best_seller()
    {
        $sell = Cart_items::select(DB::raw('SUM(quantity) as num', 'quantity'), 'product_id as id')->groupBy('product_id')->orderBy('num', 'DESC')->take(4)->get();
        if (count($sell) > 0) {
            $are = [];
            foreach ($sell as $se) {
                $are[] = $se->id;
            }
        }

        if (isset($are)) {
            $best_seller = Products::whereIn('id', $are)->select('id', 'name', 'image', 'quantity', 'price')->get()->toArray();
            foreach($best_seller as $key => $product)
            {
                $best_seller[$key]['image'] = 'http://localhost:8000'.$product['image'];
                $best_seller[$key]['price'] = number_format($product['price']).'VND';
            }

            return response()->json($best_seller);
        }
        return response()->json([]);
    }

    public function get_product_cart(Request $rq)
    {
        $list = $rq->list;
        
        $pros = json_decode($list,true);
        
        if(!empty($pros)):
            $arr = [];
            $arr_pro = [];

            $total = 0;
            foreach($pros as $pro):
                $arr = $arr+$pro;
            endforeach;
            $i = 0;
            foreach($arr as $key => $val):
                $i ++;
                $product = Products::find($key);

                $total += intval($product->price)*$val;
                
                $arr_pro[] = array(
                    'key' => $i,
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => 'http://localhost:8000'.$product->image,
                    'data_price' => $product->price,
                    'price' => number_format($product->price).'VND',
                    'quantity' => $val,
                    'total' => number_format($val*$product->price).'VND'
                );
            endforeach;

            return response()->json(['products' => $arr_pro,'total' => number_format($total).'VND']);

        endif;
    }

    public function get_product_by_slug(Request $rq)
    {
        $slug = $rq->slug;


        if($slug == null) return response()->json(['msg' => 'Slug không được để trống']);

        $product = Products::where('slug',$slug)->select('id','name','price','image','description')->first();

        if(empty($product)) return response()->json(['msg' => 'Sản phẩm không tồn tại']);

        $arr = array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => number_format($product->price).'VND',
            'image' => 'http://localhost:8000'.$product->image,
            'description' => $product->description
        );

        return response()->json($arr);
    }


    public function get_relate_product(Request $rq)
    {
        $slug = $rq->slug;

        if($slug == null) return response()->json(['msg' => 'Slug không được để trống']);

        $product = Products::where('slug',$slug)->first();

        if(empty($product)) return response()->json(['msg' => 'Sản phẩm không tồn tại']);

        $products = Products::where([
            ['cate_id',$product->cate_id],
            ['id','<>',$product->id]
        ])->take(4)->select('name','slug','price','image')->get()->toArray();

        $arr = [];

        foreach($products as $product):
            $arr[] = array(
                'name' => $product['name'],
                'slug' => $product['slug'],
                'price' => number_format($product['price']).'VND',
                'image' => 'http://localhost:8000'.$product['image']
            );
        endforeach;


        return response()->json($arr);
    }



















    public function get_option_header()
    {
        $arr = array(
            'global_logo' => null,
            'global_phone' => null,
            'global_phone_display' => null,
            'icon_phone' => 'http://localhost:8000/cowell/client/img/phone_volume.png'
        );

        $logo = Options::where('option_key','header_logo')->first();
        if(!empty($logo)) $arr['global_logo'] = asset($logo->option_value);

        $phone = Options::where('option_key','header_phone')->first();
        if(!empty($phone))
        {
            $arr['global_phone_display'] = preg_replace('/([0-9]{4})([0-9]{3})([0-9]+)/',"$1.$2.$3",$phone->option_value);
            $arr['global_phone'] = 'tel:'.$phone->option_value; 
        }

        return response()->json($arr);

    }

    public function get_menus()
    {
        $menus = [];
        $cates = Categories::all();
        foreach ($cates as $key => $cat) {
            if ($cat->parent_id == 0) {
                $menus[$cat->id] = array(
                    'name' => $cat->name,
                    'slug' => $cat->slug
                );
                unset($cates[$key]);
            }
        }

        foreach ($cates as $cat) {
            $menus[$cat->parent_id]['sub_menu'][] = array(
                'name' => $cat->name,
                'slug' => $cat->slug
            );
        }

        foreach($menus as $key => $menu)
        {
            if(isset($menu['sub_menu']) && !empty($menu['sub_menu']))
            {
                $menus[$key]['check'] = true;
            }
            else
            {
                $menus[$key]['check'] = false;
            }
        }

        return response()->json($menus);
    }


    public function get_footer()
    {
        $arr = array(null,null,null,null);

        $ft1 = Options::where('option_key','ft1')->first();
        if(!empty($ft1)) $arr[0] = json_decode($ft1->option_value,true);


        $ft2 = Options::where('option_key','ft2')->first();
        if(!empty($ft2)) $arr[1] = json_decode($ft2->option_value,true);


        $ft3 = Options::where('option_key','ft3')->first();
        if(!empty($ft3)) $arr[2] = json_decode($ft3->option_value,true);

        $facebook = Options::where('option_key','facebook')->first();
        if(!empty($facebook)) $arr[3] = json_decode( $facebook->option_value,true);

        return response()->json($arr);
    }


    public function get_number_cart(Request $request)
    {
        $items = $request->cookie('cart_item');
        return $items;
    }


    public function get_current_user($id)
    {
        $user = Users::find($id);

        $arr = array(
            'name' => $user->name,
            'email' => $user->email
        ); 

        return response()->json($arr);
    }

    public function get_item_checkout(Request $request)
    {
        $carts = $request->cookie('cart_item');

        $carts = json_decode($carts,true);

        $arr = [];

        foreach($carts as $key => $cart):
            $product = Products::find($key);
            $arr[] = array(
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $cart
            );
        endforeach;

        return response()->json($arr);
    }



}
