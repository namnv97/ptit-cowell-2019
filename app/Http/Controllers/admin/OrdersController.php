<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Model\Products;
use App\Model\Cart_items;
use App\Model\Orders;

use App\Http\Requests\StoreUpdateOrder;
use App\Http\Requests\StoreCreateOrder;

class OrdersController extends Controller
{
    protected $_data = [];

    public function index(Request $rq)
    {
        if (empty($rq->s)) :
            $orders = Orders::paginate(10);
            $this->_data['orders'] = $orders;
        else :
            $code = strtolower($rq->s);
            $code = preg_replace('/cw/','',$code);

            $orders = Orders::where('id','=',$code)->paginate(10);
            $orders->withPath('?s='.$rq->s);
            $this->_data['orders'] = $orders;
        endif;
        $this->_data['head_title'] = 'Danh sách đơn hàng';
        return view('admin.orders.index',$this->_data);
    }

    public function create()
    {
        $this->_data['head_title'] = "Thêm đơn hàng mới";

        return view('admin.orders.create',$this->_data);
    }


    public function save(StoreCreateOrder $request)
    {
        $order = new Orders();

        $fill = $request->only('name','phone','address','notes','total');

        foreach($fill as $field => $value)
        {
            $order->$field = $value;
        }

        $order->user_id = Auth::user()->id;

        $order->save();

        foreach($request->id as $key => $s)
        {
            $ck = 0;
            $item = new Cart_items();

            $item->order_id = $order->id;
            $item->product_id = $request->id[$key];
            $item->quantity = $request->quantity[$key];

            $ck = $item->save();

            if($ck == 1) $this->minus_product($request->id[$key],$request->quantity[$key]);
        }

        return redirect()->route('admin.orders.index');
    }

    function minus_product($id,$quantity)
    {
        $product = Products::find($id);
        $num = $product->quantity;

        $product->quantity = intval($num) - intval($quantity);

        $product->save();
    }

    public function edit($id=null)
    {
        if($id == null) return back();

        $code = preg_replace('/[a-zA-Z]/','',$id);

        $order = Orders::where('id',$code)->first();


        if(empty($order)) return back();

        $items = Cart_items::leftJoin('products','products.id','cart_items.product_id')->where('order_id',$code)->select('products.name as name','products.price as price','cart_items.quantity')->get();

        $this->_data['order'] = $order;
        $this->_data['items'] = $items;
        $this->_data['head_title'] = 'Cập nhật đơn hàng '.$id;

        return view('admin.orders.update',$this->_data);
    }

    public function update(StoreUpdateOrder $request)
    {
        $code = $request->id;

        $id = preg_replace('/[a-zA-Z]/','',$code);

        $order = Orders::find($id);

        if(empty($order)) return back()->withInput();

        $fill = $request->only('name','phone','address','notes','status');

        foreach($fill as $field => $value)
        {
            $order->$field = $value;
        }

        $order->save();

        return redirect()->back()->withInput()->with('msg_update','Cập nhật thành công');
    }

    public function delete($id)
    {

    }

    public function get_products(Request $rq)
    {
        // ob_start();
        $key = $rq->key;
        $products = Products::where('name','like','%'.$key.'%')->get();

        if(count($products) == 0) echo '<span>Không có sản phẩm nào</span>';
        else
        {
            echo '<span>Chọn sản phẩm</span>';
            foreach($products as $product):
?>
        <li data-value="<?php echo $product->id; ?>"><?php echo $product->name; ?></li>
<?php
            endforeach;
        }
    }

    public function get_product(Request $rq)
    {
        $id = $rq->id;
        $quantity = $rq->quantity;
        $product = Products::find($id);
        ?>
        <tr>
            <td></td>
            <td><img src="<?php echo asset($product->image); ?>"></td>
            <td><?php echo $product->name; ?><input type="hidden" class="inputid" name="id[]" value="<?php echo $product->id; ?>"></td>
            <td class="sg_price" data-price="<?php echo $product->price; ?>"><?php echo number_format($product->price); ?></td>
            <td>
                <div class="inputqty">
                    <input type="text" name="quantity[]" value="<?php echo $quantity; ?>">
                    <span class="minus"> - </span>
                    <span class="plus"> + </span>
                </div>
            </td>
            <td><?php echo number_format($product->price*$quantity); ?></td>
            <td><span class="fa fa-trash btn btn-sm btn-danger" title="Xóa sản phẩm"></span></td>
        </tr>
        <?php
    }

}
