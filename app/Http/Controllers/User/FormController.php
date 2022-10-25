<?php

namespace App\Http\Controllers\User;

use App\Model\Transaction;
use App\Model\UserForm;
use App\Model\FormPrice;
use App\Model\Setting;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FormController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return ' فرم ها و قرارداد ها';
        } elseif ('single') {
            return ' فرم و قرارداد';
        }
    }

    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    // public function index()
    // {
    //     $items = UserForm::sortByDesc('id')->paginate(20);
    //     return view('admin.ticket.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    // }

    public function index()
    {   
        $items = UserForm::orderByDesc('id')->where("pay_status" , "active")->where('user_id',auth()->user()->id)->orderByDesc('id')->paginate($this->controller_paginate());
        if (Auth::user()->hasRole('مدیر'))
        {
            $items = UserForm::orderByDesc('id')->where("pay_status" , "active")->paginate($this->controller_paginate());
            return view('admin.admin-form.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
        }
        return view('user.user-form.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    } 

    public function edit($id)
    {
        $item = UserForm::where('user_id',auth()->user()->id)->findOrFail($id);
        if (Auth::user()->hasRole('مدیر')) {
            $item = UserForm::findOrFail($id);
            return view('admin.admin-form.show', compact('item'), ['title1' => $item->form_type, 'title2' =>$item->form_type]);
        }
        return view('user.user-form.show', compact('item'), ['title1' => $item->form_type, 'title2' =>$item->form_type]);
    }

    public function store(Request $request)
    {
        $form_price = FormPrice::where('form_name',$request->form_type)->first();
        if ($form_price->count()) {
            $price = $form_price->amount;
            $form = new UserForm();
            $form->first_name       = $request->first_name ;
            $form->last_name        = $request->last_name ;
            $form->child            = $request->child ;
            $form->code_meli        = $request->code_meli ;
            $form->address          = $request->address ;
            $form->ashnaie          = $request->ashnaie ;
            $form->moaref           = $request->moaref ;
            $form->father_name      = $request->father_name ;
            $form->phone            = $request->phone ;
            $form->sabeghe_vekalat  = $request->sabeghe_vekalat ;
            $form->description      = $request->description ;
            $form->birthday         = $request->birthday ;
            $form->education        = $request->education ;
            $form->visa_type        = $request->visa_type ;
            $form->whatsapp         = $request->whatsapp ;
            $form->job              = $request->job ;
            $form->bimeh            = $request->bimeh ;
            $form->en_lang          = $request->en_lang ;
            $form->en_level         = $request->en_level ;
            $form->gr_lang          = $request->gr_lang ;
            $form->gr_level         = $request->gr_level ;
            $form->count            = $request->count ;
            $form->nesbat           = $request->nesbat ;
            $form->reject           = $request->reject ;
            $form->monthly_amount   = $request->monthly_amount ;
            $form->all_amount       = $request->all_amount ;
            $form->user_id          = auth()->user()->id ;
            $form->form_type        = $request->form_type ;
            $form->company_name     = $request->company_name ;
            $form->code             = $request->code ;
            $form->created_year     = $request->created_year ;
            $form->save();
    
            if ($form_price->amount > 0) {
                $t = new Transaction();
                $t->user_id       = auth()->user()->id;
                $t->type          = "buy_form";
                $t->factor_id     = $form->id;
                $t->total         = $form_price->amount;
                $t->amount        = $form_price->amount;
                $t->final_amount  = $form_price->amount;
                $t->description   = "درخواست فرم مشاوره ".$form->form_type." به مبلغ ".$price;
                $t->save();
                return redirect()->route('user.user-transaction.show',$t->id);
            } else {
                $form->pay_status = 'active';
                $form->save();
                return redirect()->route('user.forms.index');
            }
        }
        return back();
    }

}
