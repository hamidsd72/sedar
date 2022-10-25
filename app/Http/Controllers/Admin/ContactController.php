<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Setting;
use App\Model\Contact;
use App\Model\Photo; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return ' لیست تیکت ها';
        } elseif ('single') {
            return ' تیکت ';
        }
    } 

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }
  
    public function index()
    {
        $items = '';
        $sub_items = '';
        if (Auth::user()->hasRole('مدیر')) 
        {
            $items = Contact::where('answered', 'no')->orderBy('id','desc')->where('belongs_to_item', '=', 0)->paginate($this->controller_paginate());
        }
        elseif (Auth::user()->hasRole('برندینگ و فرنچایز')) {
            $items = Contact::where('category', 'برندینگ و فرنچایز')->where('answered', 'no')->orderBy('id','desc')->where('belongs_to_item', '=', 0)->paginate($this->controller_paginate());
        }
        elseif (Auth::user()->hasRole('ویزا')) {
            $items = Contact::where('category', 'ویزا')->where('answered', 'no')->orderBy('id','desc')->where('belongs_to_item', '=', 0)->paginate($this->controller_paginate());
        }
        elseif (Auth::user()->hasRole('استعدادیابی')) {
            $items = Contact::where('category', 'استعدادیابی')->where('answered', 'no')->orderBy('id','desc')->where('belongs_to_item', '=', 0)->paginate($this->controller_paginate());
        }
        if ($items) {
            $sub_items = Contact::where('answered', 'no')->whereIn('belongs_to_item', $items->pluck('id') )->get();
        }
        return view('admin.content.contact.index', compact('items','sub_items'), ['title1' => 'محتوا سایت', 'title2' => $this->controller_title('sum')]);
    }

    public function send_email(Request $request,$id)
    {
        $item=Contact::find($id);
        try {
        send_mail($item->email, 'پاسخ به تماس با ما آی مشاور با موضوع : '.$item->subject,$request->text);
        $item->reply+=1;
        $item->update();
        return redirect()->back()->with('flash_message', 'ارسال ایمیل با موفقیت انجام شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال ایمیل تماس بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function send_ticket(Request $request,$id)
    {
        $item = Contact::find($id);
        $sub_items = Contact::where('belongs_to_item', $item->id )->get();
        try {
            $belongs_to_item              = 0;
            if ($request->belongs_to_item) {
                $belongs_to_item = $request->belongs_to_item;
            }
            $ticket = new Contact();
            $ticket->user_id              = $item->user_id;
            $ticket->full_name            = $item->full_name;
            $ticket->belongs_to_item      = $belongs_to_item;
            $ticket->subject              = 'پاسخ به تیکت با موضوع : '.$item->subject;
            $ticket->text                 = $request->text;
            $ticket->category             = $request->category;
            $ticket->answered             = 'yes';
            if ($request->hasFile('attach')) {
                // $request->validate([
                //     'attach' => 'required|mimes:pdf,xlx,csv|max:2048',
                // ]);          
                $ticket->attach = file_store($request->attach, 'source/asset/uploads/ticket/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
            }
            $ticket->save();

            $item->reply+=1;
            $item->update();

            foreach ($sub_items as $sub_item) {
                $sub_item->reply+=1;
                $sub_item->update();
            }

            return redirect()->back()->with('flash_message', 'ارسال تیکت با موفقیت انجام شد.'); 

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال تیکت بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id)
    {
        $item = Contact::find($id);
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'تماس با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در حذف تماس بوجود آمده،مجددا تلاش کنید');
        }
    }


}


