<?php

namespace App\Http\Controllers;

use App\Models\Accessorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccessoriesController extends Controller
{
    function index(){
        return view('accessories');
    }

    function save(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'id_product'=>'required',
            'name'=>'required',
            'description' => 'required|string|max:255',
            'color'=>'required|string|max:10',
            'size'=>'required|string|max:5'
        ]);

        if ($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $path = $request->file('image');
            if ($request->file('image')) {
                $destinationPath = 'photos/';
                $image = date('YmdHis') . "." . $path->getClientOriginalName();
                $path->move($destinationPath, $image);
            }


            $data =[
                'image' => $image,
                'id_product' => $request->id_product,
                'name' =>  $request->name,
                'description' =>  $request->description,
                'color' =>  $request->color,
                'size' => $request->size
            ];
            $query = DB::table('accessories')->insert($data);
            if ($query){
                return response()->json(['status'=>1,'msg'=>'The shirt has been created successfully']);
            }
        }
    }


    function show(){
        $accessories = Accessorie::join('products', 'products.id_product', '=', 'accessories.id')
            ->get(['accessories.*', 'products.*']);
        return view('accessories',['items'=>$accessories]);
    }

    function edit($id)
    {
        $item = DB::table('accessories')->where('id',$id)->first();
        return view('edit-accessories',compact('item'));
    }

    function update(Request $request, $id)
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
        $product = DB::table('products')->where('id_product',$request->id_product)->first();

        $data = array();
        $data['image'] =  $request->image;
        $data['id_product'] = $request->id_product;
        $data['name'] =  $request->name;
        $data['description'] =  $request->description;
        $data['color'] =  $request->color;
        $data['size'] =  $request->size;

        if ($product != null ){
            $post  = DB::table('accessories')->where('id',$id);
            $post->update($data);
            return redirect('accessories')->with('success','Accessorie updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function delete($id){
        $item = DB::table('accessories')->where('id',$id);
        $item->delete();

        return redirect('accessories');
    }
}
