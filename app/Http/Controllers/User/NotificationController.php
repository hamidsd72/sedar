<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Model\Filep; 
use App\Model\ProvinceCity;
use App\Model\Slider;
use App\Model\ServiceCat;
use App\Model\Photo;
use App\Model\Custom;
use App\Model\About;
use App\Model\Setting;
use App\Model\ServiceBuy;
use App\Model\ServiceFactor;
use App\Model\ServicePlus;
use App\Model\Notification;
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
        $items = Notification::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate($this->controller_paginate());
        return view('user.notification.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function show($id)
    {
        $item = Notification::where('user_id', auth()->user()->id)->findOrFail($id);
        $item->status = 'active';
        $item->save();
        return view('user.notification.show', compact('item'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('single')]);
    }
}