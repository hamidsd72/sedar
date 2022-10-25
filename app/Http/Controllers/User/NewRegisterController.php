<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Sms;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Model\Filep; 
use App\Model\ProvinceCity;
use App\Model\Slider;
use App\Model\ServiceCat;
use App\Model\Photo;
use App\Model\Custom;
use App\Model\About;
use App\Model\Service;
use App\Model\OffCode;
use App\Model\ServicePackage;
use App\Model\ServiceBuy;
use App\Model\ServiceFactor;
use App\Model\ServicePlus;
use App\Model\ServicePlusBuy;
use App\Model\ServicePackagePrice;
use Illuminate\Support\Facades\Auth;
use App\Model\Contact;
use Illuminate\Support\Facades\Cookie;


class NewRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ( strlen($request->mobile) == 11 ) {
            $number          = $request->mobile;
            $mobile_verified = rand(100000, 999999);
            $user            = User::where('mobile', $number)->first();
    
            if ($user) {
                $user->mobile_verified = $mobile_verified;
                $user->update();
    
            } else {
                $user = User::create([
                    'mobile'          => $number,
                    'password'        => Hash::make($number),
                    'mobile_verified' => $mobile_verified,
                ]);
                $user->assignRole('کاربر');
            }
    
            Sms::SendSms( (' کد فعالسازی imoshaver : '.$user->mobile_verified) , $number);
            $count = \App\Model\SmsCount::first();
            $count->number += 1;
            $count->save();
            return redirect('/sign-up-using-mobile/'.$number.'/edit');
        }
        $error = 'شماره وارد شده نامعتبر است';
        return view('auth.login', compact('error') );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $number = $id;
        return view('auth.verify', compact('number') );
    }

    public function update(Request $request, $id)
    {
        
        if ( strlen($request->code) == 6 ) {
            $user = User::where('mobile',$id)->first();
            
            if ($user->mobile_verified == $request->code  && $user->updated_at->diffInMinutes(Carbon::now(), false) < 5) {
                auth()->loginUsingId($user->id, true);
                return redirect()->route('user.index');
            }
            $error  = 'کد صحیح نیست یا تاریخ گذشته است';
        } else {
            $error = 'کد وارد شده نامعتبر است';
        }

        $number = $id;
        return view('auth.verify', compact('number', 'error') );
    }

    public function destroy($id)
    {
        //
    }
}