<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\ServiceCat;
use App\Model\Photo;
use App\Model\Custom;
use App\Model\About;
use App\Model\Service;
use App\Model\OffCode;
use App\Model\ServicePackage;
use App\Model\ServiceBuy;
use App\Model\ServiceFactor;
use App\Model\ServicePlus;
use App\Model\ServicePlusBuy;
use App\Model\ServicePackagePrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Contact;

class SearchController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
 
    public function search(Request $request) 
    {
        if ($request->search) {
            $category_id = $request->category_id;
            if(isset($category_id)){
                $items = Service::where('category_id',$category_id)->where( 'title' ,  'like' , '%'. $request->search .'%' )->take(20)->get();
            }else {
                $items = Service::where('category_id','!=',4)->where( 'title' ,  'like' , '%'. $request->search .'%' )->take(20)->get();
            }
            $ServiceCats = ServiceCat::where('type','service')->where('id','!=',4)->whereIn('id', $items->pluck('category_id') )->first();
            if ($ServiceCats) {
                // dd($items , $ServiceCats);
                // return view('user.search.index', compact('items','ServiceCats','category_id'), ['title1' => 'موارد یافت شده', 'title2' => 'موارد یافت شده']);
                return redirect()->route('user.services',$ServiceCats->id);
            }
            return redirect()->back()->with(['status' => 'danger', "message" => "موردی یافت نشد"]);
        }
        return false;
    }
}