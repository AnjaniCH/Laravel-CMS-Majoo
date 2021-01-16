<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Comment;
use App\Detail;
use App\Header;
use App\Product;
use App\Brand;
use App\User;
use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request, $id) {
        $user = Auth::user()->id;
        $products = Product::find($id);

        $validation = Validator::make($request->all(), [
           'qty' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        } else if($request->qty <= 0) {
            return redirect()->back()->withErrors('min 1');
        } else if($request->qty > $products->stock) {
            return redirect()->back()->withErrors('gaboleh lebih dari stock');
        } else {

            $user_id = $user;
            $product_id = $products->id;
            $image = $products->image;
            $name = $products->name;
            $qty = $request->qty;
            $price = $products->price;
            $subtotal = $products->price * $request->qty;


            $cart = new Cart;
            $cart->user_id = $user;
            $cart->product_id = $product_id;
            $cart->image = $image;
            $cart->name = $name;
            $cart->qty = $qty;
            $cart->price = $price;
            $cart->subtotal = $subtotal;
            $cart->save();
        }
        return redirect('/shopping-cart');

    }

    public function indexAdd($id) {
        $product = Product::find($id);
        $brand = Brand::where('name', '=', '%'.$product->brand.'%')->get();
        $comments = Comment::where('product_id', '=', $product->id)->get();

        return view('users.product', compact('product', 'brand', 'comments'));
    }

    public function indexCart()
    {
        $user = Auth::user()->id;
        $carts = Cart::where('user_id','=', $user)->get();

        // nanti kalo ga mager ganti caranya jd bikin object dari model, ternyata bisa juga kyk pas complete payment (kyknya, harusnya)
        $storedItem = array();

        $totalQty = 0;
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $totalQty += $cart->qty;
            $totalPrice += $cart->subtotal;

            $product = Product::where('id','=',$cart->products_id)->get();
            array_push($storedItem, $product);
        }

        return view('users.shopping-cart', compact('user', 'carts', 'totalQty', 'qty', 'totalPrice'));
    }

    public function removeCart($id){
        $carts = Cart::find($id);
        $carts->delete();

        return redirect()->back();
    }

    public function checkout($id)
    {
        $carts = Cart::with('user')->where('user_id', 'LIKE', "%{$id}%")->get();
        $user = User::find($id);

        $header = new Header();
        $header->user_id = Auth::user()->id;
        $header->date = date('Y-m-d H:i:s');
        $header->status = 'Success';

        $header->save();

        foreach ($carts as $cart){
            $detail = new Detail();
            $detail->header_id = $header->id;
            $detail->product_id = $cart->product_id;
            $detail->qty = $cart->qty;

            $detail->save();

            $product = Product::find($cart->id);
            $product->stock-=$cart->qty;

            $cart->delete();
        }

        return redirect('/shopping-cart');
    }

    public function history(){
        $headers = Header::where('user_id', '=', Auth::user()->id)->get();

        return view('users.history-transaction',compact('headers'));
    }

    public function viewTransaction(){
        $transactions = Header::all();

        return view('transaction-history',compact('transactions'));
    }

    public function detailTransaction($id){
        $headers = Header::find($id);
        $details = Detail::where('header_id', '=', $headers->id)->get();

        $totalqty = 0;
        $grandtotal = 0;

        foreach ($details as $detail) {
            $totalqty += $detail->qty;
            $subtotal = $detail->product->price * $detail->qty;
            $grandtotal += $subtotal;
        }

        return view('users.transaction-detail', compact('details','subtotal','totalqty','grandtotal'));
    }



}
