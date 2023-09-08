<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;
use Session;


class BackendController extends Controller
{


   public function dashboard(){


    return view('Backend.backend-contend');

   }

   public function productsList(){


      $products = Product::all();
      $categories =Category::all();
      return view('Backend.products-list', compact('products','categories'));

   }

   public function categoryList(){
      $category =Category::all();
      return view('Backend.category-list', compact('category'));
   }

   public function addProduct(Request $request){

            $product = new Product() ; 
            if($request->hasFile('image')){
             $file = $request->file('image');
             $ext = $file->getClientOriginalExtension();
             $filename = time().'.'.$ext;
             $file->move('assets/images',$filename);
             $product->image = $filename;
     
            }
            $product -> cate_id= $request ->input('cate_id');
            $product -> name = $request ->input('product_name');
            $product -> slug = $request ->input('slug');
            $product -> small_description = $request ->input('smallDescription');
            $product -> description = $request ->input('description');
            $product -> original_price = $request ->input('original_price');
            $product -> selling_price = $request ->input('selling_price');
            $product -> qty = $request ->input('qty');
            $product -> tax = $request ->input('tax');
            $product -> status = $request ->input('status');
            $product ->deal= $request ->input('deal');
            $product ->slug = $request ->input('slug');
            $product -> meta_title = $request ->input('meta_title');
            $product -> meta_keyword = $request ->input('meta_keyword');
            $product -> meta_description = $request ->input('meta_description');
            $product ->save();
 
            return redirect()->back()->with('status', 'Product inserted successfully');
 
     }

     public function editProduct($id){

      $product = Product::where('id','=',$id)->first();
      $category =Category::all();
      return view('Backend.edit-product', compact('product','category'));

     }

    public function updateProduct(Request $request, $id){

      $product = Product::find($id);

      if($request->hasFile('image'))
      {
          $path = 'assets/images/'.$product->image;
          if(File::exists($path))
          {
              File::delete($path);
          }
       
               $file = $request->file('image');
               $ext = $file->getClientOriginalExtension();
               $filename = time().'.'.$ext;
               $file->move('assets/images/',$filename);
               $product->image = $filename;
      }
      
         $product -> cate_id= $request ->input('category');
         $product -> name = $request ->input('product_name');
         $product -> sku = $request ->input('sku');
         $product -> small_description = $request ->input('smallDescription');
         $product -> description = $request ->input('description');
         $product -> original_price = $request ->input('original_price');
         $product -> selling_price = $request ->input('selling_price');
         $product -> offer_price = $request ->input('offer_price');
         $product ->deal_start_date = $request ->input('deal-start-date');
         $product ->deal_end_date = $request ->input('deal-end-date');
         $product -> qty = $request ->input('qty');
         $product -> tax = $request ->input('tax');
         $product -> status = $request ->input('status');
         $product ->deal = $request ->input('deal');
         $product ->slug = $request ->input('slug');
         $product -> meta_title = $request ->input('meta_title');
         $product -> meta_keyword = $request ->input('meta_keyword');
         $product -> meta_description = $request ->input('meta_description');
         $product ->update();

         return redirect('/product-lists')->with('status', 'Product updated successfully');


  }

  public function deleteProduct($id)
  {
   
   Product::find($id)->delete();

      return back()->with('status', 'Product Deleted Successfully');
  }


public function addCategory(Request $request){
      $category = new Category() ; 
      $category -> category_name = $request ->input('cate_name');
      $category ->slug = $request ->input('slug');
      $category -> status = $request ->input('status');
      $category -> trending = $request ->input('trending');
      $category -> description = $request ->input('description');
      $category -> meta_title = $request ->input('meta_title');
      $category -> meta_description = $request ->input('meta_description');
      $category -> meta_keywords = $request ->input('meta_keywords');
      $category ->save();
      return redirect()->back()->with('status', 'Category added successfully');



     }


     public function editCategory($id){
      $category = Category::find($id);
      return response()->json(['status' => 200,'category' => $category]);


  }

  public function updateCategory(Request $request){

   $cate_id = $request->input('cate_id_hidden');
   $category = Category::find($cate_id);
   $category->category_name = $request ->input('cate_name');
   $category -> status = $request ->input('status');
   $category -> trending = $request ->input('trending');
   $category ->update();
   return redirect()->back()->with('status', 'Category updated successfully');

  }

  public function editCateDelete($id){ 

   $Category = Category::find($id);
   return response()->json(['status' => 200,'Category' => $Category]); 

}

  public function deleteCategory(Request $request){

   $cate_id = $request->input('hidden_cate_id');

   $category=Category::find($cate_id);
   $category->delete();

   return redirect()->back()->with('status', 'Category deleted successfully');


  }

  public function orderList(){


  $orders=Order::all();
     
 return view('Backend.view-orders',compact('orders'));         

  }


  public function editOrder($id){
   $orders = Order::find($id);
   return response()->json(['status' => 200,'Orders' => $orders ]);
  }

  public function updateOrder(Request $request){

   $order_id = $request->input('order_id_hidden');
   $order = Order::find($order_id);
   $order->id = $request ->input('order_id');
   $order->delivery_date = $request ->input('delivery_date');
   $order->delivery_status = $request ->input('delivery_status');
   $order->update();

//    $order_item = OrderItems::where('order_id','=',$request->input('order_id_hidden'))->get();

// //    foreach($order_item as $order)
// //    {
// //       OrderItems::create([
// //       'order_id' => $request ->input('order_id')

// //    ]);
// // }

   return redirect()->back()->with('status', 'Order Updated successfully');


  }

  public function viewSingleOrder($id){

   $orders=DB::table('orders as order')
   ->join('order_items  as order_item', 'order_item.order_id', '=', 'order.id') 
   ->join('products as product', 'order_item.prod_id', '=', 'product.id')
   ->where('order.id', '=', $id)
   ->get(['order.id',
   'order_item.unit_price',
   'order_item.qty',
   'product.name',
   'product.image'
   ]);

   return view('Backend.view-single-orders',compact('orders'));

  }

  public function generatePDF($id){

   $order =Order::where('id','=',$id)->first();
   $order_item=OrderItems::where('order_id','=',$id)->get();

   // return view('Backend.billing_invoice',compact('order','order_item'));

   // $pdf = Pdf::loadView('');
   // return $pdf->download('billing-invoice');
   // set_time_limit(600);
   // $pdf = PDF::loadView('Backend.billing_invoice', ['order' => $order, 'order_item'=> $order_item]);

   // return $pdf->download('invoice.pdf');

   $data = [
      'order' => $order,
      'order_item' => $order_item
  ];
     set_time_limit(600);
  $pdf = PDF::loadView('Backend.billing_invoice', $data);

  return $pdf->download('invoice.pdf');

  }

// End of Controller Class............................
}
