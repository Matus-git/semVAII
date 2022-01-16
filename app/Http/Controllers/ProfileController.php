<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile(){

        $id_user = Auth::id();
        $id_address = DB::table('users')->where('id',$id_user)->value('address_id');

        $profile = DB::table('users')->where('id',$id_user)->first();
        $address = DB::table('addresses')->where('id',$id_address)->first();

        return view('my-profile')->with('data', ['address' => $address, 'profile' => $profile]);
    }

    public function editProfile(){
        $id_user = Auth::id();
        $item = DB::table('users')->where('id',$id_user)->first();
        return view('edit-profile',compact('item'));
    }

    function updateProfile(Request $request, $id)
    {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'phone_number'=> ['required', 'string', 'max:10'],
            ]);

            $dataUser = array();
            $dataUser['name'] =  $request->name;
            $dataUser['surname'] = $request->surname;
            $dataUser['phone_number'] =  $request->phone_number;

        $profile = DB::table('users')->where('id',$id)->first();

        if ($profile != null ){
            $postUser  = DB::table('users')->where('id',$id);
            $postUser->update($dataUser);
            return back()->with('success','Profile updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }

    }

    function changeAddress(){
        $id_user = Auth::id();
        $id_address = DB::table('users')->where('id',$id_user)->value('address_id');
        $item = DB::table('addresses')->where('id',$id_address)->first();
        return view('edit-address',compact('item'));
    }

    function updateAddress(Request $request, $id)
    {
        $request->validate([
            'state' => ['required', 'string', 'min:3'],
            'city' => ['required', 'string', 'min:3'],
            'street' => ['required', 'string', 'min:3'],
            'post_code' => ['required', 'string', 'min:5', 'max:15'],
            'house_number'=> ['required', 'string', 'min:1', 'max:15'],
        ]);

        $dataAddress = array();
        $dataAddress['state'] =  $request->state;
        $dataAddress['post_code'] =  $request->post_code;
        $dataAddress['city'] = $request->city;
        $dataAddress['street'] = $request->street;
        $dataAddress['house_number'] = $request->house_number;


        $address = DB::table('addresses')->where('id',$id)->first();

        if ($address != null ){
            $postAddress  = DB::table('addresses')->where('id',$id);
            $postAddress->update($dataAddress);
            return back()->with('success','Address updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }

    }

    function changeEmail(){
        $id_user = Auth::id();
        $item = DB::table('users')->where('id',$id_user)->first();
        return view('change-email',compact('item'));
    }

    function updateEmail(Request $request, $id){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $dataUser = array();
        $dataUser['email'] =  $request->email;

        $profile = DB::table('users')->where('id',$id)->first();

        if ($profile != null ){
            $postUser  = DB::table('users')->where('id',$id);
            $postUser->update($dataUser);
            return back()->with('success','Profile updated successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }


    }

    function deleteProfile(){
        $id_user = Auth::id();

        $address = DB::table('addresses')->where('id',$id_user);
        $profile = DB::table('users')->where('id',$id_user);

        $profile->delete();
        $address->delete();
        return redirect('/');
    }
}
