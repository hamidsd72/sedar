<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Setting;
use App\Model\Network;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'شبکه های اجتماعی اپلیکیشن';
        } elseif ('single') {
            return 'شبکه اجتماعی اپلیکیشن';
        }
    }

    public function controller_title2($type)
    {
        if ($type == 'sum') {
            return 'تنظیمات اپلیکیشن';
        } elseif ('single') {
            return 'تنظیمات اپلیکیشن';
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

    public function index()
    {
        $items = Network::all()->sortByDesc('id');
        return view('admin.setting.network.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function create()
    {
        return view('admin.setting.network.create', ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function store(Request $request)
    {
        Network::create($request->all());
        return redirect()->route('admin.network-setting.index');
    }

    public function destroy($id)
    {
        Network::findOrFail($id)->delete();
        return redirect()->route('admin.network-setting.index');
    }

    public function edit()
    {
        $item = Setting::find(1);
        return view('admin.setting.edit', compact('item'), ['title1' => $this->controller_title2('single'), 'title2' => $this->controller_title2('sum')]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:240',
            'keyword' => 'nullable|max:500',
            'description' => 'nullable|max:500',
            'paginate' => 'required',
            'logo_site' => 'nullable|image|mimes:png|max:5120',
            'icon_site' => 'nullable|image|mimes:png|max:5120',
        ],
            [
                'title.required' => 'لطفا نام سایت را وارد کنید',
                'title.max' => 'نام سایت نباید بیشتر از 240 کاراکتر باشد',
                'keyword.max' => 'کلمات کلیدی نباید بیشتر از 500 کاراکتر باشد',
                'description.max' => 'توضیحات سئو نباید بیشتر از 500 کاراکتر باشد',
                'paginate.required' => 'تعداد نمایش فیلد در هر صفحه را وارد کنید',
                'logo_site.image' => 'لطفا یک تصویر انتخاب کنید',
                'logo_site.mimes' => 'لطفا یک تصویر با پسوندهای (png,jpg,jpeg) انتخاب کنید',
                'logo_site.max' => 'لطفا حجم تصویر حداکثر 5 مگابایت باشد',
                'icon_site.image' => 'لطفا یک تصویر انتخاب کنید',
                'icon_site.mimes' => 'لطفا یک تصویر با پسوندهای (png,jpg,jpeg) انتخاب کنید',
                'icon_site.max' => 'لطفا حجم تصویر حداکثر 5 مگابایت باشد',
            ]);
        $item = Setting::find($id);
        try {
            $item->title = $request->title;
            $item->keyword = $request->keyword;
            $item->description = $request->description;
            $item->paginate = $request->paginate;
            if ($request->hasFile('logo_site')) {
                if (is_file($item->logo_site))
                {
                    $old_path = $item->logo_site;
                    File::delete($old_path);
                }
                $item->logo_site = file_store($request->logo_site, 'source/asset/uploads/setting/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'logo_site-');
            }
            if ($request->hasFile('icon_site')) {
                if (is_file($item->icon_site))
                {
                    $old_path = $item->icon_site;
                    File::delete($old_path);
                }
                $item->icon_site = file_store($request->icon_site, 'source/asset/uploads/setting/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'icon_site-');;
            }
            $item->update();
            if ($request->hasFile('logo_site')) {
                img_resize(
                    $item->logo_site,//address img
                    $item->logo_site,//address save
                    150,// width: if width==0 -> width=auto
                    0// height: if height==0 -> height=auto
                // end optimaiz
                );
            }
            if ($request->hasFile('icon_site')) {
                img_resize(
                    $item->icon_site,//address img
                    $item->icon_site,//address save
                    50,// width: if width==0 -> width=auto
                    0// height: if height==0 -> height=auto
                // end optimaiz
                );
            }
            return redirect()->back()->with('flash_message', 'تنظیمات سایت با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ویرایش تنظیمات سایت بوجود آمده،مجددا تلاش کنید');
        }
    }

}


