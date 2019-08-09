<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Model\Orders;
use App\Model\Cart_items;
use App\Model\Products;

class OrderMailling extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $order;

    public function __construct(Orders $order)
    {
        $arr = [];
        $arr['id'] = $order->id;
        $arr['name'] = $order->name;
        $arr['email'] = $order->email;
        $arr['phone'] = $order->phone;
        $arr['address'] = $order->address;
        $arr['notes'] = $order->notes;
        $items = Cart_items::leftJoin('products','products.id','=','cart_items.product_id')->where('cart_items.order_id',$order->id)->select('products.name as name','products.price as price','cart_items.quantity as quantity')->get();
        foreach($items as $item)
        {
            $arr['product'][] = array(
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity
            );
        }
        $this->order = $arr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Shopping Laravel : Đơn hàng mới')->view('mails.mail');
    }
}
