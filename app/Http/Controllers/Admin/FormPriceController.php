<?php

namespace App\Http\Controllers\Admin;

use App\Model\Filep;
use App\Model\FormPrice;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FormPriceController extends Controller
{
    public function controller_title($type)
    {
        if ($type == 'sum') {
            return ' قیمت فورم ها و قرارداد ها';
        } elseif ('single') {
            return ' قیمت فورم و قرارداد';
        }
    }
    
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function index()
    {
        $items = FormPrice::whereIn('form_name',['عریضه نویسی','مشاوره خصوصی برندینگ و فرنچایز','مشاوره خصوصی ویزا'])->get();
        return view('admin.form-price.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function update(Request $request, $id)
    {
        $form = FormPrice::findOrFail($id);
        $form->amount = $request->amount;
        $form->save();
        return back();
    }

}
