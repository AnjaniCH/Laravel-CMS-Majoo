<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);

        return view('users.product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        //
        $rules = [
            'name' => 'required|min:3',
            'brand' => 'required',
            'description' => 'required',
            'price' => 'required|min:3',
            'discount' => 'required',
            'stock' => 'required',
        ];
        $messages = array(
            'name.unique' => $request->input('name') . 'name already exists!',
        );
        $valid = Validator::make($request->input(), $rules, $messages);
        if($valid->fails()){
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        } else {
            $products = new Product();
            $products->name = $request->input('name');
            $products->brand = $request->input('brand');
            $products->description = $request->input('description');
            $products->price = $request->input('price');
            $products->discount = $request->input('discount');
            $products->stock = $request->input('stock');

            $file = $request->file('image');

            if($file != ""){
                $ext = $file->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' .$ext;
                $image = Image::make($request->file('image'));
                $image->resize(120, 120);
                $products->image = '/img/' . $fileName;
                $image->save(base_path().'/public/img/'. $fileName);
				//$path = public_path('uploads/' . $fileName);
				//Image::make($file->getRealPath())->resize(120, 120)->save($path);
            }


            if($products->save()){
                Session::flash('flash_message', 'Product information is stored successfully!');
                return redirect('/manage-product');
            }
        }
    }

    public function insertProduct()
    {
        $brand = Brand::all();
        return view('admins.insert-product', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $product = Product::find($request->id);
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->stock = $request->input('stock');
        $file = $request->file('image');
        if($file != ""){
            $ext = $file->getClientOriginalExtension();
            $fileName = rand(10000, 50000) . '.' .$ext;
            $product->image = '/img/' . $fileName;
            $file->move(base_path().'/public/img', $fileName);
        }
        if($product->save()){
            Session::flash('flash_message', 'Product information is updated successfully!');
            return redirect('/manage-product');
        }
    }

    public function updateProduct($id)
    {
        //
        $product = Product::find($id);
        $brand = Brand::all();

        return view('admins.update-product', compact('product','brand'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        if(Product::destroy($id)){
            Session::flash('deleted_message', 'Product information is deleted successfully!');
            return redirect('/manage-product');
        }
    }

    public function getAll(){
        $products = Product::all();
        $products = Product::paginate(8);

        return view('admins.manage-product', compact('products'));
    }

    public function edit($id){
        return view('admins.update-product', compact('id'));
    }

    public function insertComment(Request $request){

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->date = date('Y-m-d H:i:s');

        $comment->save();

        return redirect()->back();
    }

    public function searchProduct(Request $request){

        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")->get();

        return view('search-result')->with('products', $products);
    }
}
