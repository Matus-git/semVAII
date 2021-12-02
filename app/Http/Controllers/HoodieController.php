<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hoodie;

class HoodieController extends Controller
{

    function index(){
        return view('hoodie');
    }

    function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'=>'required',
            'description' => 'required',
            'color'=>'required',
            'size'=>'required'
        ]);

        $path = $request->file('image');
        if ($request->file('image')) {
            $destinationPath = 'photos/';
            $image = date('YmdHis') . "." . $path->getClientOriginalName();
            $path->move($destinationPath, $image);
        }

        $post = new Hoodie;
        $post->image = $image;
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
       $hoodies = Hoodie::all();
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
            'name'=>'required',
            'description' => 'required',
            'color'=>'required',
            'size'=>'required'
        ]);


        $path = $request->file('image');
        if ($request->file('image')) {
            $destinationPath = 'photos/';
            $image = date('YmdHis') . "." . $path->getClientOriginalName();
            $path->move($destinationPath, $image);
        }

        $data = array();
        $data['image'] =  $request->image;
        $data['name'] =  $request->name;
        $data['description'] =  $request->description;
        $data['color'] =  $request->color;
        $data['size'] =  $request->size;

       $post  = DB::table('hoodies')->where('id_hoodie',$id_hoodie)->update($data);

        if ($post > 0){
            return back()->with('success','Hoodie updated successfully');
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
