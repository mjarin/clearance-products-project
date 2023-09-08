<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\ReturnOrder;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class FrontEndController extends Controller
{
    public function frontPage(Request $request){


        if($request->ajax() && isset($request->start)){

           $start=$request->start;
           $end=$request->end;

           $products = DB::table('products')
           ->where('selling_price','>=', $start)
           ->where('selling_price','<=', $end)
           ->orderby('selling_price','ASC')
           ->get();

        //    dd($products);

            response()->json($products);
            return view('price-range-view', compact('products'));

        }else{

            $categories = Category::all();
            $categories_wise_product = Category::where('status','=','1')->get();
            $products = Product::all();
            $deal_product = Product::where('deal','=','1')->get();
           
            return view('welcome', compact('categories','products','deal_product','categories_wise_product'));

        }

    }




    public function searchProduct(){


        $products =Product::select('name')->get();

        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;


    }

    public function submitSearch(Request $req){

        $search_product = $req->product_name;
        if($search_product != "")
        {
            $products =Product::where("name","LIKE","%$search_product%")
                        ->orWhere("slug","LIKE","%$search_product%")
                        ->orWhere("selling_price","LIKE","%$search_product%")
                        ->get();
            if($products)
            {
                $categories = Category::all();
                // $categories_wise_product = Category::where('status','=','1')->get();
                return view('view-searched-product',compact('products','categories'));
            }
            else
            {
                return redirect()->back()->with('error', 'No products matched your search');
            }
        }
        else{
            return redirect()->back();
        }


    }

    public function searchCategory(Request $request , $id){

        if($request->ajax() && isset($request->start)){
           $start=$request->start;
           $end=$request->end;
        $products = DB::table('products')
        ->where('cate_id','=',$id)
        ->where('selling_price','>=', $start)
        ->where('selling_price','<=', $end)
        ->orderby('selling_price','ASC')
        ->get();

        response()->json($products);
        return view('price-range-view-cate', compact('products'));

        }else{
        $products =Product::where('cate_id',$id)->get();    
        $categories = Category::all();
        $cateId = Category::where('id', $id)->first();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('category-wise-products', compact('categories','products','cateId'));
        }

    }

    public function viewSingleProduct($id){
        $product = Product::where('id','=',$id)->first();
        return view('single-product', compact('product'));
    }

    public function singleProductFromCate($id){

    $product=Product::where('id','=', $id)->first();
    $categories = Category::all();
    // $categories_wise_product = Category::where('status','=','1')->get();
    return view('single-from-multi-products', compact('product','categories'));
}

public function singleFromMultiProduct($id){

    $product=Product::where('id','=', $id)->first();
    $categories = Category::all();
    // $categories_wise_product = Category::where('status','=','1')->get();
    return view('single-from-multi-products', compact('product','categories'));

}


    public function TermsAndCondition(){

        $categories = Category::all();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('terms-and-condition', compact('categories'));

    }

    public function PrivacyPolicy(){
        $categories = Category::all();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('privacy-policy', compact('categories'));
    }
    
    
        public function returnPolicy(){
        $categories = Category::all();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('return-policy', compact('categories'));
    }
    
    public function aboutUs(){

        $categories = Category::all();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('about-us-2', compact('categories'));

    }

    Public function returnRequest(){

        $categories = Category::all();
        // $categories_wise_product = Category::where('status','=','1')->get();
        return view('return-request', compact('categories'));

    }


public function submitReturnRequest(Request $request){

    $customer =$request->input('customer_name');
    $order_id =$request->input('order_id');
    $phone =$request->input('phone');
    $date = Carbon::now()->format('Y-m-d');
    
    // $phone =$request->input('phone');
    $order =Order::where('id','=', $order_id)
    ->where('customer_name','=', $customer)
    ->where('phone','=', $phone)->first();
    
    if($order !=''){
    $datetime1 = strtotime($date); // convert to timestamps
    $datetime2 = strtotime($order->delivery_date); // convert to timestamps
    $days = (int)(($datetime1 - $datetime2)/86400);

    if($days > 3){
        
        return redirect('/')->with('status','Sorry , return date has been expired');
    }else{
        
      $return = new ReturnOrder();
      $return->customer_name=$request->input('customer_name');
      $return->order_id=$request->input('order_id');
      $return->phone=$request->input('phone');
      $return->return_reason=$request->input('return_reason');
      $return->save();
      
    $order =Order::where('id','=', $order_id)
    ->where('customer_name','=', $customer)
    ->where('phone','=', $phone)->first();
    $return->return_reason=$request->input('return_reason');
    $order->update();
      
      return redirect('/')->with('status','Request Has Been Sent');
        
    }
    }    
    else{
        return redirect()->back()->with("status","Order information didn't match");
    
}

}


// End of class...................
}
