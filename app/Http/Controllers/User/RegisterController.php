<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Sms;
use App\Model\Filep; 
use App\Model\ProvinceCity;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
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
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function register($code)
    {
        session(['reagent_code' => $code]);
        return redirect()->route('user.mobile');
    }

    public function agent()
    {
        session(['agent' => true]);
        session()->forget('verify_set');
        return view('auth.register.mobile');
    }
    public function mobile(Request $request)
    {
        if (session()->has('agent')) {
            session()->forget('agent');
        }

        return view('auth.register.mobile');
    }
    public function verify()
    {
        return view('auth.register.verify');
    }
    public function complete()
    {
        if (!session()->has('verify_set')) {
            abort(404);
        }
        $states=ProvinceCity::where('parent_id',null)->get();
        return view('auth.register.complete',compact('states'));
    }
    public function complete_agent()
    {
        if (!session()->has('verify_set') or !session()->has('agent')) {
            abort(404);
        }
        $states=ProvinceCity::where('parent_id',null)->get();
        return view('auth.register.agent',compact('states'));
    }
    public function mobile_post(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
        ],
            [
                'mobile.required' => 'لطفا موبایل خود را وارد کنید',
                'mobile.regex' => 'لطفا موبایل خود را وارد کنید',
                'mobile.digits' => 'لطفا فرمت موبایل را رعایت کنید',
                'mobile.numeric' => 'لطفا موبایل خود را بصورت عدد وارد کنید',
                'mobile.unique' => 'موبایل وارد شده یکبار ثبت نام شده',
            ]);
        $verify=rand(1000,9999);
        session(['verify_code' => $verify]);
        session(['mobile_num' => $request->mobile]);
        session(['sim' => $request->sim]);
        $text='کد تایید سدارکارت : '.$verify;
        //Sms::SendSms($text  ,$request->mobile);
        return redirect()->route('user.verify')->with('flash_message', 'کد ارسال شده به شماره همراه خود را وارد کنید');
    }
    public function verify_post(Request $request)
    {
        if($request->verify_code==session('verify_code'))
        {
            session(['verify_set' => 'ok']);
            if(session()->has('agent'))
            {
                return redirect()->route('user.complete.agent')->with('flash_message', 'جهت تکمیل درخواست فرم را ارسال کنید');
            }
            return redirect()->route('user.complete')->with('flash_message', 'جهت تکمیل ثبت نام فرم را ارسال کنید');
        }
        else {
            return redirect()->back()->withInput()->with('err_message', 'لطفا کد تایید را صحیح وارد کنید');
        }
    }
    public function complete_post(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:240',
            'last_name' => 'required|max:240',
            'email' => 'nullable|email|unique:users',
            'whatsapp' => 'required',
//            'date_birth' => 'required',
//            'state_id' => 'required',
//            'city_id' => 'required',
//            'locate' => 'required',
//            'address' => 'required',
//            'education' => 'required',
            'password' => 'required|min:6|confirmed',
        ],
            [
                'first_name.required' => 'لطفا نام خود را وارد کنید',
                'first_name.max' => 'نام نباید بیشتر از 240 کاراکتر باشد',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید',
                'last_name.max' => 'نام خانوادگی نباید بیشتر از 240 کاراکتر باشد',
                'email.email' => 'فرمت ایمیل را رعایت کنید',
                'email.unique' => ' ایمیل وارد شده یکبار ثبت نام شده',
                'whatsapp.required' => 'لطفا شماره واتساپ فعال خود را وارد کنید',
//                'date_birth.required' => 'لطفا تاریخ تولد خود را وارد کنید',
//                'state_id.required' => 'لطفا استان خود را وارد کنید',
//                'city_id.required' => 'لطفا شهر خود را وارد کنید',
//                'locate.required' => 'لطفا منطقه خود را وارد کنید',
//                'address.required' => 'لطفا آدرس خود را وارد کنید',
//                'education.required' => 'لطفا مدرک تحصیلی خود را وارد کنید',
                'password.required' => 'لطفا رمز عبور خود را وارد کنید',
                'password.min' => 'رمز عبور نباید کمتر از 6 کاراکتر باشد',
                'password.confirmed' => 'رمز عبور با تکرار آن برابر نیست',
            ]);
        try{
            $item = new User();
            $item->first_name = $request->first_name;
            $item->last_name = $request->last_name;
            $item->mobile = session('mobile_num');
            $item->sim = session('sim');
            $item->email = $request->email;
            $item->mobile = $request->whatsapp;
            $item->whatsapp = $request->whatsapp;
            $item->date_birth = num_to_en($request->date_birth);
            $item->state_id = $request->state_id;
            $item->city_id = $request->city_id;
            $item->locate = $request->locate;
            $item->address = $request->address;
            $item->education = $request->education;
            $item->password = $request->password;
            if ($request->referrer) {
                $user = User::where('reagent_id', $request->referrer)->first();
                if ($user) {
                    $item->referrer_id = $user->id;
                }
            }

            if (session()->has('reagent_code')) {
                $item->reagent_code = session('reagent_code');
            }
            else {
                if ($request->referrer) {
                    $user = User::where('reagent_id', $request->referrer)->first();
                    if ($user) {
                    $item->reagent_code = $request->referrer;
                        }
                }
            }
            $item->mobile_status = 'active';
            $item->user_status = 'active';
            $item->save();
            $item->assignRole('کاربر');
            session()->forget('mobile_num');
            session()->forget('verify_set');
            session()->forget('verify_code');
            if (session()->has('reagent_code')) {
                session()->forget('reagent_code');
            }
            $fullname=$item->first_name.' '.$item->last_name;
            $text=$fullname.' عزیز ثبت نام شما در سدارکارت با موفقیت انجام شد';

            return redirect()->route('login')->with('flash_message', 'ثبت نام شما با موفقیت انجام شد');
         } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی بوجود آمده،مجددا تلاش کنید');
        }
    }
    public function complete_agent_post(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:240',
            'last_name' => 'required|max:240',
            'email' => 'nullable|email|unique:users',
            'whatsapp' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'locate' => 'required',
            'address' => 'required',
            'education' => 'required',
            'company_name' => 'required',
            'phone' => 'nullable|regex:/(0)[0-9]{10}/|digits:11|numeric',
            'file' => 'required|mimes:zip,rar|max:30720',
            'text' => 'required',
            'password' => 'required|min:6|confirmed',
        ],
            [
                'first_name.required' => 'لطفا نام خود را وارد کنید',
                'first_name.max' => 'نام نباید بیشتر از 240 کاراکتر باشد',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید',
                'last_name.max' => 'نام خانوادگی نباید بیشتر از 240 کاراکتر باشد',
                'email.email' => 'فرمت ایمیل را رعایت کنید',
                'email.unique' => ' ایمیل وارد شده یکبار ثبت نام شده',
                'whatsapp.required' => 'لطفا شماره واتساپ فعال خود را وارد کنید',
                'state_id.required' => 'لطفا استان خود را وارد کنید',
                'city_id.required' => 'لطفا شهر خود را وارد کنید',
                'locate.required' => 'لطفا منطقه خود را وارد کنید',
                'address.required' => 'لطفا آدرس خود را وارد کنید',
                'education.required' => 'لطفا مدرک تحصیلی خود را وارد کنید',
                'company_name.required' => 'لطفا نام شرکت خود را وارد کنید',
                'phone.regex' => 'لطفا شماره ثابت خود را صحیح وارد کنید',
                'phone.digits' => 'لطفا فرمت شماره ثابت را رعایت کنید(11 رقم و با صفر شروع شود)',
                'phone.numeric' => 'لطفا شماره ثابت خود را بصورت عدد وارد کنید',
                'file.required' => 'لطفا فایل مدارک را انتخاب کنید',
                'file.mimes' => 'لطفا یک فایل با پسوند (zip,rar) انتخاب کنید',
                'file.max' => 'لطفا حجم فایل حداکثر 30 مگابایت باشد',
                'text.required' => 'لطفا توضیحاتی از خود وارد کنید',
                'password.required' => 'لطفا رمز عبور خود را وارد کنید',
                'password.min' => 'رمز عبور نباید کمتر از 6 کاراکتر باشد',
                'password.confirmed' => 'رمز عبور با تکرار آن برابر نیست',
            ]);
        try{
            $item = new User();
            $item->first_name = $request->first_name;
            $item->last_name = $request->last_name;
            $item->mobile = $request->email;
            $item->email = $request->email;
            $item->whatsapp = $request->whatsapp;
            $item->date_birth = num_to_en($request->date_birth);
            $item->state_id = $request->state_id;
            $item->city_id = $request->city_id;
            $item->locate = $request->locate;
            $item->address = $request->address;
            $item->education = $request->education;
            $item->company_name = $request->company_name;
            $item->web_site = $request->web_site;
            $item->phone = $request->phone;
            $item->text = $request->text;
            $item->password = $request->password;
            if (session()->has('agent')) {
                $reagent = User::where('reagent_id','!=',null)->latest()->firstOrFail();
                $reagent_id=intval($reagent->reagent_id)+intval(rand(10,100));
                $item->reagent_id = $reagent_id;
            }
            $item->mobile_status = 'active';
            $item->save();
            if ($request->hasFile('file')) {
                $file = new Filep();
                $file->path = file_store($request->file, 'source/asset/uploads/user/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');;
                $item->file()->save($file);
            }
            $item->assignRole('نماینده');

            session()->forget('mobile_num');
            session()->forget('verify_set');
            session()->forget('verify_code');
            session()->forget('agent');
            $fullname=$item->first_name.' '.$item->last_name;
            $text=$fullname.' عزیز درخواست شما جهت پذیرش نمایندگی با موفقیت ثبت شد(منتظر تایید ادمین باشد)';
            Sms::SendSms($text  ,$item->mobile);
            return redirect()->route('login')->with('flash_message', 'درخواست شما جهت پذیرش نمایندگی با موفقیت ثبت شد(منتظر تایید ادمین باشد)');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی بوجود آمده،مجددا تلاش کنید');
        }

    }
}
