<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductController extends Controller
{
    function index(){
       // return view('create-hoodie');
    }

    function getProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

    function store(Request $request)
    {

        $request->validate([
            'price'=>'required|numeric',
            'valid_from' => 'required',
            'valid_until'=>'required'
        ]);

        $post = new Product;
        $post->price = $request->price;
        $post->valid_from = $request->valid_from;
        $post->valid_until = $request->valid_until;

        $post->save();

        if ($post->save()){
            return redirect('create-hoodie')->with('success','Price inserted successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function showPrices(){
        $prices = Product::all();
        return view('show-prices',['prices'=>$prices]);
    }

    function editPrice($id){
        $price = DB::table('products')->where('id_product',$id)->first();
        return view('edit-price',compact('price'));
    }

    function updatePrice(Request $request,$id)
    {
        $request->validate([
            'price'=>'required|numeric',
            'valid_from' => 'required',
            'valid_until'=>'required'
        ]);

        $data = array();
        $data['price'] =  $request->price;
        $data['valid_from'] = $request->valid_from;
        $data['valid_until'] =  $request->valid_until;

        $price = DB::table('products')->where('id_product',$id)->first();

        if ($price != null ){
            $post  = DB::table('products')->where('id_product',$id);
            $post->update($data);
            return redirect('show-prices')->with('success','Price updated successfully');

        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function deletePrice($id){
        $productH = DB::table('hoodies')->where('id_product',$id)->value('id_hoodie');
        $productS = DB::table('shirts')->where('id_product',$id)->value('id_shirt');

        if ($productH < 1 && $productS < 1){
            $price = DB::table('products')->where('id_product',$id);
            $price->delete();
            return back()->with('success','Price deleted successfully');
        } else {
            return back()->with('fail','There is a product which is using this price ! Change product price than delete');
        }
    }

}
