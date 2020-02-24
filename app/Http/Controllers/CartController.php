<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\Auth;
 use Cart;
class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));

    }

    public function addItem(Request $request, $id){
		
		$products = DB::table('venue')
			 ->where('v_id', $id)	 
			 ->first(); 
		//venue
       /* $products = products::find($id); // get prodcut by id
        if(isset($request->newPrice))
        {
          $price = $request->newPrice; // if size select
        }
        else{
          $price = $products->pro_price; // default price
        }*/
		$price="100";
        $status['rowId']= Cart::add($id,$products->title,1,$price,['img' => $products->image_1,'stock' => 1]);
		$status['cnt'] = Cart::count();
		//$status['cartData'] = Cart::content();
		//$status['rowId']=$cartData->rowId;
		//@foreach($cartData as $cartD)
		$status['id'] = $id;
		$status['name'] = $products->title;
		$status['image'] = $products->image_1;
		
		return $status;
			//Cart::update($id,1); // for update
          // return $cartItems = Cart::content();
//return '{"r_id": ' . json_encode($status) . '}'; 
        // return back();
    }

    public function destroy($id){
        Cart::remove($id);
        return back(); // will keep same page
    }
 public function remove_cart_item($id){
        Cart::remove($id);
		//$status['deletedid']=$id;
		$status['deletedid']=$id;
		 return '{"remove_id": ' . json_encode($status) . '}';      
    }
    public function update(Request $request, $id)
    {
        $qty = $request->qty;
              $proId = $request->proId;
           $rowId = $request->rowId;
            Cart::update($rowId,$qty); // for update
            $cartItems = Cart::content(); // display all new data of cart
            return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
            $products = products::find($proId);
              $stock = $products->stock;
              if($qty<$stock){
                  $msg = 'Cart is updated';
                 Cart::update($id,$request->qty);
                 return back()->with('status',$msg);
              }else{
                   $msg = 'Please check your qty is more than product stock';
                    return back()->with('error',$msg);
              }       

          }


}
