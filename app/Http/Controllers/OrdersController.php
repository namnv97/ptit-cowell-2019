<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\OrderMailling;
use Illuminate\Support\Facades\Mail;

use App\Model\Products;
use App\Model\Orders;
use App\Model\Cart_items;
use Auth;

use App\Http\Requests\StoreOrdersAdd;

class OrdersController extends Controller
{
    protected $_data = [];

    public function index(Request $request)
    {
        $cart_item = [];
        $items = $request->cookie('cart_item');
        if (!empty($items)) :
            $list_item = json_decode($items, true);
            if (!empty($list_item)) :
                foreach ($list_item as $key => $qt) :
                    $product = Products::find($key);
                    $cart_item[] = array(
                        'product' => $product,
                        'quantity' => $qt
                    );
                endforeach;
            endif;
        endif;

        $this->_data['cart_items'] = $cart_item;
        $this->_data['head_title'] = "Giỏ hàng";
        return view('client.cart', $this->_data);
    }

    public function update_cart_item(Request $request)
    {
        $key = $request->id;
        $num = $request->num;
        $ci = $request->cookie('cart_item');
        $ard[] = json_decode($ci, true);
        $arr = $ard[0];

        $arr[$key] = $num;

        $response = new Response();
        $response->withCookie('cart_item', json_encode($arr), 60 * 24 * 90);
        echo json_encode(['status' => true]);
        return $response;
    }

    public function delete_item(Request $request)
    {
        $key = $request->id;

        $ci = $request->cookie('cart_item');

        $ard[] = json_decode($ci, true);
        $arr = $ard[0];

        unset($arr[$key]);

        $response = new Response();
        $response->withCookie('cart_item', json_encode($arr), 60 * 24 * 90);
        echo json_encode(['status' => true]);
        return $response;
    }

    public function delete_cart(Request $request)
    {
        $response = new Response();
        $response->withCookie('cart_item', 1, -1);
        echo json_encode(['status' => true]);
        return $response;
    }


    public function add_to_cart(Request $request)
    {
        $id = $request->id;
        $ci = $request->cookie('cart_item');
        if (empty($ci)) {
            $arr[$id] = 1;
        } else {
            $ard[] = json_decode($ci, true);
            $arr = $ard[0];
            if (isset($ard[0][$id])) {
                $arr[$id] = $ard[0][$id] + 1;
            } else {
                $arr[$id] = 1;
            }
        }
        $response = new Response();
        $response->withCookie('cart_item', json_encode($arr), 60 * 24 * 90);
        echo json_encode(['status' => true, 'items' => count($arr)]);
        return $response;
    }

    public function count_items(Request $request)
    {
        $items = $request->cookie('cart_item');
        return $items;
    }

    public function add_order(StoreOrdersAdd $request)
    {
        // dd($request->all());
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->notes = $request->notes;

        $order->save();

        foreach ($request->id as $key => $pro) {
            $item = new Cart_items();

            $item->order_id = $order->id;
            $item->product_id = $pro;
            $item->quantity = $request->quantity[$key];

            $item->save();

            $this->minus_product($pro,$request->quantity[$key]);
        }

        Mail::to($request->email)->send(new OrderMailling($order));

        return redirect()->route('client.thankyou')->with('msg_order', 'Đặt hàng thành công');
    }

    public function checkout(Request $request)
    {
        $items = $request->cookie('cart_item');

        if(empty($items)) return redirect()->route('home');

        $items = json_decode($items, true);

        $arr = [];

        foreach($items as $key => $val):
            $product = Products::where('id',$key)->first();

            $arr[] = array(
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $val
            );
        endforeach;

        $this->_data['items'] = $arr;
        $this->_data['head_title'] = 'Thanh toán';
        return view('client.checkout', $this->_data);
    }

    public function checkout_save(StoreOrdersAdd $request)
    {
        $items = $request->cookie('cart_item');

        $items = json_decode($items, true);

        $order = new Orders();

        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->notes = $request->notes;

        $order->save();

        foreach($items as $key => $val)
        {
            $item = new Cart_items();

            $item->order_id = $order->id;
            $item->product_id = $key;
            $item->quantity = $val;

            $item->save();

            $this->minus_product($key,$val);
        }

        $cookie = cookie('cart_item','delete cookie',-1);

        Mail::to($request->email)->send(new OrderMailling($order));

        return redirect()->route('client.thankyou')->with('msg_order', 'Đặt hàng thành công')->withCookie($cookie);
    }


    public function view_order($code = null)
    {
        if($code == null):
            $orders = Orders::where('user_id','=',Auth::user()->id)->paginate(10);

            // $arr = [];
            if(count($orders) > 0):
                $this->_data['orders'] = $orders;
            endif;

            return view('client.orders',$this->_data);
        else:
            $code = preg_replace('/CW/','',$code);
            $order = Orders::find($code);
            if(empty($order)) return back();
            $items = Cart_items::leftJoin('products', 'cart_items.product_id', '=', 'products.id')->where('cart_items.order_id', '=', $code)->select('products.name as name', 'products.price as price', 'products.image as image', 'cart_items.quantity as quantity')->get();
            $this->_data['items'] = $items;
            $this->_data['order'] = $order;
            
            return view('client.order_detail',$this->_data);

        endif;
    }


    function minus_product($id,$quantity)
    {
        $product = Products::find($id);
        $num = $product->quantity;

        $product->quantity = intval($num) - intval($quantity);

        $product->save();
    }

}