<?php

namespace App\Http\Controllers;

use App\Models\Shirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ShirtController extends Controller
{
    function index(){
        return view('shirt');
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
            $query = DB::table('shirts')->insert($data);
            if ($query){
                return response()->json(['status'=>1,'msg'=>'The shirt has been created succsesfully']);
            }
        }
    }


    function show(){
        $shirts = Shirt::join('products', 'products.id_product', '=', 'shirts.id_product')
            ->get(['shirts.*', 'products.*']);
        return view('shirt',['shirts'=>$shirts]);
    }

    function edit($id_shirt)
    {
        $shirt = DB::table('shirts')->where('id_shirt',$id_shirt)->first();
        return view('edit-shirt',compact('shirt'));
    }

    function update(Request $request, $id_shirt)
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
            $post  = DB::table('shirts')->where('id_shirt',$id_shirt);
            $post->update($data);
            return redirect('shirt')->with('success','Shirt updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function delete($id_shirt){
        $shirt = DB::table('shirts')->where('id_shirt',$id_shirt);
        $shirt->delete();

        return redirect('shirt');
    }

}
