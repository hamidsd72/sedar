<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Model\Sms;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'numeric','unique:users',],
            'whatsapp' => ['required', 'numeric'],
            'state_id' => ['required', 'numeric'],
            'city_id' => ['required', 'numeric'],
            'locate' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'date_birth' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        dd($data);
         $user=new User();
        $user->first_name= $data['f_name'];
        $user->last_name= $data['l_name'];
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->whatsapp = $data['whatsapp'];
        $user->state_id = $data['state_id'];
        $user->city_id = $data['city_id'];
        $user->locate = $data['locate'];
        $user->address = $data['address'];
        if (isset($data['reagent_code'])){
            $user->reagent_code = $data['reagent_code'];
        }
        $user->date_birth = $data['date_birth'];
        $user->education = $data['education'];
        $user->password = $data['password'];
        $user->save();
         return $user->assignRole('کاربر');
    }
}
