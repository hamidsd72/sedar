<?php

namespace App\Http\Controllers\User;

use App\Model\About;
use App\User;
use App\Model\Contact;
use App\Model\Network;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show()
    {
        $about = About::first();
        $network = Network::where('status', 'active')->orderBy('sort')->get();
        return view('user.contact.show',compact('about','network'));
    }
    // public function form_post(Request $request)
    // {
    //     try{
    //         $item=new Contact();
    //         if(Auth::check()){$item->user_id=Auth::user()->id;}
    //         $item->full_name=$request->full_name;
    //         $item->email=$request->email;
    //         $item->subject=$request->subject; 
    //         $item->text=$request->text;
    //         $item->save();
    //         return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
    //     }
    //     catch (\Exception $error)
    //     {
    //         return redirect()->back()->with('err_message', 'مشکلی در ارسال فرم بوجود آمده ، مجدد تلاش کنید');
    //     }
    // }
}
