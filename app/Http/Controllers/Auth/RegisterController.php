<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=> ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'state' => ['required', 'string', 'min:3'],
            'city' => ['required', 'string', 'min:3'],
            'street' => ['required', 'string', 'min:3'],
            'post_code' => ['required', 'string', 'min:5', 'max:15'],
            'house_number'=> ['required', 'string', 'min:1', 'max:15'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $address = Address::create([
            'state' => $data['state'],
            'post_code'=>$data['post_code'],
            'city' => $data['city'],
            'street' => $data['street'],
            'house_number'=> $data['house_number'],
        ]);
        $address->save();

        if( $data['email'] == 'admin@localhost.com'){
            return User::create([
                'name' => $data['name'],
                'surname'=> $data['surname'],
                'phone_number'=> $data['phone_number'],
                'email' => $data['email'],
                'type' => 'admin',
                'password' => Hash::make($data['password']),
                'address_id'=>$address->id,

            ]);
        }
        return User::create([
            'name' => $data['name'],
            'surname'=> $data['surname'],
            'phone_number'=> $data['phone_number'],
            'email' => $data['email'],
            'type' => 'default',
            'password' => Hash::make($data['password']),
            'address_id'=>$address->id,
        ]);
    }
}
