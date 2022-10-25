<?php

namespace App\Http\Controllers\User;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function form_post(Request $request)
    {   
        try
        {
            $name = 'بدون نام';
            $belongs_to_item = 0;
            if (Auth::user()->first_name || Auth::user()->last_name) {
                $name = Auth::user()->first_name.' '.Auth::user()->last_name;
            }
            if ($request->belongs_to_item) {
                $belongs_to_item = $request->belongs_to_item;
            }

            $ticket = new Contact();
            $ticket->user_id         = Auth::user()->id; 
            $ticket->full_name       = $name;
            $ticket->subject         = $request->subject;
            $ticket->category        = $request->category;
            $ticket->text            = $request->text;
            $ticket->belongs_to_item = $belongs_to_item;
            $ticket->answered        = 'no';
            if ($request->hasFile('attach')) {
                $ticket->attach = file_store($request->attach, 'source/asset/uploads/ticket/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                // $request->validate([
                //     'attach' => 'required|mimes:pdf,xlx,csv|max:2048',
                // ]);          
                
            }
            $ticket->save();
            
            return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
        }
        catch (\Exception $error)
        {
            return redirect()->back()->with('err_message', 'مشکلی در ارسال فرم بوجود آمده ، مجدد تلاش کنید');
        }
    }
}
