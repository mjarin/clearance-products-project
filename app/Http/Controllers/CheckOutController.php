<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItems;
use Illuminate\Support\Facades\DB;
use Session;

class CheckOutController extends Controller
{
    public function viewCheckoutPage(){


        return view('view-checkout',compact('product'));

    }

    public function viewCheckout(){

        $customer_ip = request()->getClientIp(); 

        $cartitems = Cart::where('user_id', $customer_ip)->get();
        foreach ($cartitems as $item) {
            
            if(!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty)->exists())
            {
                $removeitem = Cart::where('user_id', $customer_ip)->where('prod_id', $item->prod_id)->first();
                $removeitem -> delete();
            }
        }
    $categories = Category::all();
    $cartitems = Cart::where('user_id','=', $customer_ip)->get();
    return view('view-checkout',compact('cartitems', 'categories'));
       
    }

    public function placeOrder(Request $request){

        $customer_ip = request()->getClientIp(); 

        $order = new Order();
        $order->user_id = $customer_ip;
        $order->customer_name = $request->input('customer_name');
        $order->phone = $request->input('phone');
        $order->shipping_address = $request->input('shipping_address');
        $order->delivery_charge = $request->input('delivery_charge');
        // $order->total_price = $request->input('total_hidden');
        // $order->grand_total= $request->input('grand_total_hidden');

        // To calculate total_price 
        $total=0;
        $cartitems_total = Cart::where('user_id', $customer_ip )->get();
        foreach($cartitems_total as $price)
        {
            $total +=  $price->products->selling_price*$price->prod_qty; 
        }
        $order->total_price = $total;
        $order->grand_total = $total + $request->input('delivery_charge_hidden') ;
        $order->tracking_no =rand(1111,9999);
        $order->transaction_id =rand(1111,9999);
        $order->payment_id =rand(1111,9999);
        $order->save();

        $user=User::where('user_id','=',$customer_ip)->first();
        if(!$user)
        {
        $user = new User();
        $user->user_id = $customer_ip;
        $user->name = $request->input('customer_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role_as = 'customer';
        $user->address = $request->input('shipping_address');
        $user->save();
        }

        $cartitems = Cart::where('user_id', $customer_ip)->get();
    
        foreach($cartitems as $item)
        {
            OrderItems::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'unit_price' => $item->products->selling_price,
                'delivery_charge' => $request->input('delivery_charge_hidden')

            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty; 
            $prod->update();
        }


        $cartitems = Cart::where('user_id', $customer_ip)->get();
        Cart::destroy($cartitems);

        return redirect('/your-orders')->with('status', 'Order Placeed successfully');
    }

    public function yourOrders(){
        $customer_ip = request()->getClientIp();

        $orders=DB::table('orders as order')
        ->join('order_items  as order_item', 'order_item.order_id', '=', 'order.id') 
        ->join('products as product', 'order_item.prod_id', '=', 'product.id')
        ->where('order.user_id', '=', $customer_ip)
        ->get(['order.order_date',
        'order.customer_name',
        'order.shipping_address',
        'order.grand_total',
        'order_item.unit_price',
        'order.delivery_charge',
        'order_item.qty',
        'product.image'


        ]);	

        $categories = Category::all();

        return view('customers-order-list',compact('orders','categories'));

    }

    // End of Controller Class 
    }


 