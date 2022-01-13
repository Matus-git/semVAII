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
            'price'=>'required',
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

}
