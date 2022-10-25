<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Setting;
use App\Model\Photo;
use App\Model\ServiceCat;
use App\Model\ProvinceCity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'لیست کاربران';
        } elseif ('single') {
            return 'کاربر';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userRole(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($request->role_name) {
            // remove current roles
            foreach ($user->getRoleNames() as $role_name)
            {
                $user->removeRole($role_name);
            }
            // assign new roles
            $user->assignRole($request->role_name);
        }
        return back();
    }

    public function index()
    {
        if (Auth::user()->hasRole('مدیر'))
        {
            // $items = User::orderByDesc('id')->role('کاربر')->paginate($this->controller_paginate());
            $items = User::orderByDesc('id')->paginate($this->controller_paginate());
        }
        elseif (Auth::user()->hasRole('کاربر'))
        {
            abort(404);
        }
        else
        {
            $items = User::role('کاربر')->paginate($this->controller_paginate());
            // $items = User::role('کاربر')->where('reagent_code',Auth::user()->reagent_id)->where('abbreviation_agent',Auth::user()->abbreviation_agent)->paginate($this->controller_paginate());
        }
        $serviceCat = ServiceCat::all();
        return view('admin.user.index', compact('items','serviceCat'), ['title1' => 'کاربران', 'title2' => $this->controller_title('sum')]);
    }
    public function show($id)
    {
        if (Auth::user()->hasRole('مدیر')) {
            $item = User::find($id);
        } elseif (Auth::user()->hasRole('نماینده'))
        {
            $item = User::where('id',$id)->where('reagent_code',Auth::user()->reagent_id)->first();
            if(!$item)
            {
                abort(404);
            }
        }
        else {
            abort(404);
        }
        return view('admin.user.show', compact('item'), ['title1' => 'کاربران', 'title2' => 'پروفایل کاربر']);
    }
    public function create()
    {
        $states = ProvinceCity::where('parent_id', null)->get();
        return view('admin.user.create', compact('states'), ['title1' => 'کاربران', 'title2' => 'افزودن کاربر']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:240',
            'last_name' => 'required|max:240',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'whatsapp' => 'required',
            'date_birth' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'locate' => 'required',
            'address' => 'required',
            'education' => 'required',
            'password' => 'required|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ],
            [
                'first_name.required' => 'لطفا نام خود را وارد کنید',
                'first_name.max' => 'نام نباید بیشتر از 240 کاراکتر باشد',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید',
                'last_name.max' => 'نام خانوادگی نباید بیشتر از 240 کاراکتر باشد',
                'mobile.required' => 'لطفا موبایل خود را وارد کنید',
                'mobile.regex' => 'لطفا موبایل خود را وارد کنید',
                'mobile.digits' => 'لطفا فرمت موبایل را رعایت کنید',
                'mobile.numeric' => 'لطفا موبایل خود را بصورت عدد وارد کنید',
                'mobile.unique' => 'موبایل وارد شده یکبار ثبت نام شده',
                'email.required' => 'لطفا ایمیل خود را وارد کنید',
                'email.email' => 'فرمت ایمیل را رعایت کنید',
                'email.unique' => ' ایمیل وارد شده یکبار ثبت نام شده',
                'whatsapp.required' => 'لطفا شماره واتساپ فعال خود را وارد کنید',
                'date_birth.required' => 'لطفا تاریخ تولد خود را وارد کنید',
                'state_id.required' => 'لطفا استان خود را وارد کنید',
                'city_id.required' => 'لطفا شهر خود را وارد کنید',
                'locate.required' => 'لطفا منطقه خود را وارد کنید',
                'address.required' => 'لطفا آدرس خود را وارد کنید',
                'education.required' => 'لطفا مدرک تحصیلی خود را وارد کنید',
                'password.required' => 'لطفا رمز عبور خود را وارد کنید',
                'password.min' => 'رمز عبور نباید کمتر از 6 کاراکتر باشد',
                'password.confirmed' => 'رمز عبور با تکرار آن برابر نیست',
                'photo.image' => 'لطفا یک تصویر انتخاب کنید',
                'photo.mimes' => 'لطفا یک تصویر با پسوندهای (png,jpg,jpeg) انتخاب کنید',
                'photo.max' => 'لطفا حجم تصویر حداکثر 5 مگابایت باشد',
            ]);
        try {
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
            $item->password = $request->password;
            $item->reagent_code = Auth::user()->reagent_id;
            $item->save();
            $item->assignRole('کاربر');
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'source/asset/uploads/user/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $item->photo()->save($photo);
                img_resize(
                    $photo->path,//address img
                    $photo->path,//address save
                    100,// width: if width==0 -> width=auto
                    100// height: if height==0 -> height=auto
                // end optimaiz
                );
            }
            return redirect()->route('admin.user.list')->with('flash_message', 'کاربر با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ایجاد کاربر بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function edit($id)
    {
        $item = User::find($id);
        $states = ProvinceCity::where('parent_id', null)->get();
        $citys = ProvinceCity::where('parent_id', $item->state_id)->get();
        return view('admin.user.edit', compact('item', 'states', 'citys'), ['title1' => 'کاربران', 'title2' => 'ویرایش کاربر']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:240',
            'last_name' => 'required|max:240',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'whatsapp' => 'required',
            'date_birth' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'locate' => 'required',
            'address' => 'required',
            'education' => 'required',
            'password' => 'nullable|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ],
            [
                'first_name.required' => 'لطفا نام خود را وارد کنید',
                'first_name.max' => 'نام نباید بیشتر از 240 کاراکتر باشد',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد کنید',
                'last_name.max' => 'نام خانوادگی نباید بیشتر از 240 کاراکتر باشد',
                'mobile.required' => 'لطفا موبایل خود را وارد کنید',
                'mobile.regex' => 'لطفا موبایل خود را وارد کنید',
                'mobile.digits' => 'لطفا فرمت موبایل را رعایت کنید',
                'mobile.numeric' => 'لطفا موبایل خود را بصورت عدد وارد کنید',
                'mobile.unique' => 'موبایل وارد شده یکبار ثبت نام شده',
                'email.required' => 'لطفا ایمیل خود را وارد کنید',
                'email.email' => 'فرمت ایمیل را رعایت کنید',
                'email.unique' => ' ایمیل وارد شده یکبار ثبت نام شده',
                'whatsapp.required' => 'لطفا شماره واتساپ فعال خود را وارد کنید',
                'date_birth.required' => 'لطفا تاریخ تولد خود را وارد کنید',
                'state_id.required' => 'لطفا استان خود را وارد کنید',
                'city_id.required' => 'لطفا شهر خود را وارد کنید',
                'locate.required' => 'لطفا منطقه خود را وارد کنید',
                'address.required' => 'لطفا آدرس خود را وارد کنید',
                'education.required' => 'لطفا مدرک تحصیلی خود را وارد کنید',
                'password.min' => 'رمز عبور نباید کمتر از 6 کاراکتر باشد',
                'password.confirmed' => 'رمز عبور با تکرار آن برابر نیست',
                'photo.image' => 'لطفا یک تصویر انتخاب کنید',
                'photo.mimes' => 'لطفا یک تصویر با پسوندهای (png,jpg,jpeg) انتخاب کنید',
                'photo.max' => 'لطفا حجم تصویر حداکثر 5 مگابایت باشد',
            ]);
        $item = User::find($id);
        try {
            $item->first_name = $request->first_name;
            $item->last_name = $request->last_name;
            $item->mobile = $request->mobile;
            $item->email = $request->email;
            $item->whatsapp = $request->whatsapp;
            $item->date_birth = num_to_en($request->date_birth);
            $item->state_id = $request->state_id;
            $item->city_id = $request->city_id;
            $item->locate = $request->locate;
            $item->address = $request->address;
            $item->education = $request->education;
            if ($request->password) {
                $item->password = $request->password;
            }
            $item->update();
            if ($request->hasFile('photo')) {
                if ($item->photo)
                {
                    $old_path = $item->photo->path;
                    File::delete($old_path);
                    $item->photo->delete();
                }
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'source/asset/uploads/user/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');;
                $item->photo()->save($photo);
                img_resize(
                    $photo->path,//address img
                    $photo->path,//address save
                    100,// width: if width==0 -> width=auto
                    100// height: if height==0 -> height=auto
                // end optimaiz
                );
            }
            return redirect()->route('admin.user.list')->with('flash_message', 'کاربر با موفقیت ویرایش شد.');
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ویرایش کاربر بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id)
    {
        $item = User::find($id);
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'کاربر با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در حذف کاربر بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function active($id, $type)
    {
        $item = User::find($id);
        try {
            $item->user_status = $type;
            $item->update();
            if ($type == 'blocked') {
                return redirect()->back()->with('flash_message', 'کاربر با موفقیت مسدود شد.');
            }
            if ($type == 'active') {
                return redirect()->back()->with('flash_message', 'کاربر با موفقیت فعال شد.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در تغییر وضعیت کاربر بوجود آمده،مجددا تلاش کنید');
        }
    }
}


