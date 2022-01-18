<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hoodie;
use App\Models\Product;

class HoodieController extends Controller
{

    function index(){
        return view('hoodie');
    }

    function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'id_product'=>'required',
            'name'=>'required',
            'description' => 'required|string|max:255',
            'color'=>'required|string|max:10',
            'size'=>'required|string|max:5'
        ]);

        $path = $request->file('image');
        if ($request->file('image')) {
            $destinationPath = 'photos/';
            $image = date('YmdHis') . "." . $path->getClientOriginalName();
            $path->move($destinationPath, $image);
        }

        $post = new Hoodie;
        $post->image = $image;
        $post->id_product = $request->id_product;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->color = $request->color;
        $post->size = $request->size;
        $post->save();

        if ($post->save()){
            return back()->with('success','Hoodie inserted successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function show(){

        $hoodies = Hoodie::join('products', 'products.id_product', '=', 'hoodies.id_product')
            ->get(['hoodies.*', 'products.*']);
        return view('hoodie',['hoodies'=>$hoodies]);
    }

    function edit($id_hoodie)
    {
            $hoodie = DB::table('hoodies')->where('id_hoodie',$id_hoodie)->first();
            return view('edit-hoodie',compact('hoodie'));
    }

   function update(Request $request, $id_hoodie)
   {

        $request->validate([
            'id_product'=>'required',
            'name'=>'required',
            'description' => 'required|string|max:255',
            'color'=>'required|string|max:10',
            'size'=>'required|string|max:5'
        ]);


        $path = $request->file('image');
        if ($request->file('image')) {
            $destinationPath = 'photos/';
            $image = date('YmdHis') . "." . $path->getClientOriginalName();
            $path->move($destinationPath, $image);
        }
        $product = DB::table('products')->where('id_product',$request->id_product)->first();

        $data = array();
        $data['image'] =  $request->image;
        $data['id_product'] = $request->id_product;
        $data['name'] =  $request->name;
        $data['description'] =  $request->description;
        $data['color'] =  $request->color;
        $data['size'] =  $request->size;

        if ($product != null ){
            $post  = DB::table('hoodies')->where('id_hoodie',$id_hoodie);
            $post->update($data);
            return redirect('hoodie')->with('success','Hoodie updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function delete($id_hoodie){
    $hoodie = DB::table('hoodies')->where('id_hoodie',$id_hoodie);
    $hoodie->delete();

    return redirect('hoodie');
    }

}
