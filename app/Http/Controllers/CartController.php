<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Session;

class CartController extends Controller
{

public function loadCart(){

    $customer_ip = request()->getClientIp(); 

    $cartCount = Cart::where('user_id','=',$customer_ip)->count();
        
    return response()->json(['count' => $cartCount]);

}
    public function addToCartFromCateSearch(Request $req){
            
        $customer_ip = request()->getClientIp(); 
        $product_id = $req->input('product_id');
        $product_qty = $req->input('product_qty');
    
                $prod_check = Product::where('id','=', $product_id)->first();
    
                if($prod_check)
                {
                    if(Cart::where('prod_id' ,$product_id)->where('user_id', $customer_ip)->exists())
                    {
                     return response()->json(['warning' =>'Item already added to your cart.']);
                    }
                    else
                    {
                        $cartitem = new Cart();
                        $cartitem->prod_id = $product_id;
                        $cartitem->user_id = $customer_ip;
                        $cartitem->prod_qty = $product_qty;
                        $cartitem-> save();
                        return response()->json(['success' =>' Item added to cart.']);
    
                    }
    
                }
         
            }
public function addToCart($id){ 
    
    
        $customer_ip = request()->getClientIp(); 

    
                $prod_check = Product::where('id','=', $id)->first();
    
                if($prod_check)
                {
                    if(Cart::where('prod_id' ,$id)->where('user_id', $customer_ip)->exists())
                    {
                     return response()->json(['warning' =>'Item already added to your cart.']);
                    }
                    else
                    {
                        $cartitem = new Cart();
                        $cartitem->prod_id = $id;
                        $cartitem->user_id = $customer_ip;
                        $cartitem->prod_qty =1;
                        $cartitem-> save();
                    return redirect('/view-cart')->with('status', 'Item added to cart');
    
                    }
    
                }
      
           
               
}  
            


public function viewcart(){

    $customer_ip = request()->getClientIp(); 
    $cartitems =Cart::where('user_id', $customer_ip)->get();
    $categories = Category::all();
    return view('viewcart',compact('cartitems','categories'));
        
    }

    public function deleteCartItem(Request $request){

        $customer_ip = request()->getClientIp(); 


            $product_id = $request->input('product_id');
            if(Cart::where('prod_id', $product_id)->where('user_id', $customer_ip)->exists())
            {
                $cartitem = Cart::where('prod_id', $product_id)->where('user_id', $customer_ip)->first();
                $cartitem->delete();
                return response()->json(['status' =>'Item deleted successfully']);
            }    

}


public function updateCart(Request $request){
    $customer_ip = request()->getClientIp(); 
    $product_id = $request->input('product_id');  
    $product_qty = $request->input('quantity');

    if($customer_ip)
    {
        if(Cart::where('prod_id' , $product_id)->where('user_id', $customer_ip)->exists())
        {
        $cart = Cart::where('prod_id' , $product_id)->where('user_id', $customer_ip)->first();
        $cart -> prod_qty = $product_qty; 
        $cart ->update();
        return response()->json(['status' => 'Quantity updated']);
        }
    }

}


// End of Controller class.........................
}
