<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Model\Filep; 
use App\Model\UserForm;
use App\Model\Slider;
use App\Model\FormPrice;
use App\Model\Photo;
use App\Model\Custom;
use App\Model\About;
use App\Model\Setting;
use App\Model\ServiceBuy;
use App\Model\ServicePackage;
use App\Model\Basket;
use App\Model\Notification;
use App\Model\Sms;
use App\Model\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Model\ServicePluse;
use App\Model\TourAlbum;
use Illuminate\Support\Facades\Cookie;


class NotificationController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'اعلانات';
        } elseif ('single') {
            return 'اعلان';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function index() {
        $items      = Notification::orderByDesc('id')->paginate($this->controller_paginate());
        $users      = auth()->user();
        if ($items->count()) {
            $users  = User::whereIn('id', $items->pluck('user_id'))->get(['id','first_name','last_name']);
        }
        foreach ($items as $item) {
            $item->user_id = $users->find($item->user_id) ? $users->find($item->user_id)->first_name.' '.$users->find($item->user_id)->last_name : '_________';
        }
        return view('admin.notification.index', compact('items','users'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function create()
    {
        $packages   = ServicePackage::where('status', 'active')->get();
        $services   = FormPrice::all();
        return view('admin.notification.create', compact('packages','services'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function show($id)
    {
        $item = Notification::findOrFail($id);
        $fullname = User::findOrFail($item->user_id);
        return view('admin.notification.show', compact('item','fullname'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function update(Request $request, $id)
    {
        try {
            $items = Notification::where('user_id',User::where('mobile',$request->user_mobile)->first()->id)->orderByDesc('id')->paginate($this->controller_paginate());
            $users = auth()->user();
            if ($items->count()) {
                $users = User::whereIn('id', $items->pluck('user_id'))->get(['id','mobile','first_name','last_name']);
                foreach ($users as $user) {
                    $user->mobile = $user->mobile.' '.$user->first_name.' '.$user->last_name;
                }
            }
            return view('admin.notification.edit', compact('items','users'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('err_message','کاربر پیدا نشد , احتمالا شماره اشتباه است');
        }
    }

    public function store(Request $request) 
    {
        if ($request->type == 'single') {
            $notife = new Notification();
            try {
                $notife->user_id = User::where('mobile',$request->user_id)->first()->id;
                $notife->subject = $request->subject;
                $notife->description = $request->description;
                if ($request->hasFile('attach')) {
                    $notife->atach = file_store($request->attach, 'source/asset/uploads/notification/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                }
                $notife->save();
                Sms::SendSms( 'با سلام, شما یک اعلان جدید دارید. سامانه iMoshaver' , $request->user_id);
                $count = \App\Model\SmsCount::first();
                $count->number += 1;
                $count->save();
                return redirect()->route('admin.notification.index');
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with('err_message','کاربر پیدا نشد , احتمالا شماره اشتباه است یا وارد نشده');
            }
        } elseif($request->type == 'package') {
            $bascket = Basket::where('type' , 'package')->where('status' , 'active')->where('sale_id' , ServicePackage::findOrFail($request->package)->id)->pluck('user_id');
            if ($bascket->count()) {
                foreach ($bascket as $user_id) {
                    $notife = new Notification();
                    try {
                        $user = User::find($user_id);
                        $notife->user_id = $user->id;
                        $notife->subject = $request->subject;
                        $notife->description = $request->description;
                        if ($request->hasFile('attach')) {
                            $notife->atach = file_store($request->attach, 'source/asset/uploads/notification/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                        }
                        $notife->save();
                        Sms::SendSms( 'با سلام, شما یک اعلان جدید دارید. سامانه iMoshaver' , $user->mobile);
                        $count = \App\Model\SmsCount::first();
                        $count->number += 1;
                        $count->save();
                    } catch (\Throwable $th) {
                        
                    }
                }
                return redirect()->route('admin.notification.index');
            } else { return redirect()->back()->withInput()->with('err_message','کاربری پیدا نشد'); }
        } elseif($request->type == 'service') {
            $forms = UserForm::where('pay_status', 'active')->where('form_type', $request->service)->get();
            if ($forms->count()) {
                foreach ($forms as $user_id) {
                    $notife = new Notification();
                    try {
                        $user = User::find($user_id);
                        $notife->user_id = $user->id;
                        $notife->subject = $request->subject;
                        $notife->description = $request->description;
                        if ($request->hasFile('attach')) {
                            $notife->atach = file_store($request->attach, 'source/asset/uploads/notification/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                        }
                        $notife->save();
                        Sms::SendSms( 'با سلام, شما یک اعلان جدید دارید. سامانه iMoshaver' , $user->mobile);
                        $count = \App\Model\SmsCount::first();
                        $count->number += 1;
                        $count->save();
                    } catch (\Throwable $th) {
                        
                    }
                }
                return redirect()->route('admin.notification.index');
            } else { return redirect()->back()->withInput()->with('err_message','کاربری پیدا نشد'); }
        }
        
    }

    public function destroy($id) 
    {
        Notification::findOrFail($id)->delete(); 
        return redirect()->route('admin.notification.index');
    }

}