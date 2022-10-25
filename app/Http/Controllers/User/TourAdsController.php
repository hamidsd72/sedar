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
use App\Model\TourForm;
use App\Model\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Model\ServicePluse;
use App\Model\TourAlbum;
use Illuminate\Support\Facades\Cookie;


class TourAdsController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'تورهای گردشگری';
        } elseif ('single') {
            return 'تور گردشگری';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function index($id=null) {
        $tours = TourForm::whereIn('cancel', ['active','cancel'])->where('user_id', auth()->user()->id)->orderByDesc('id')->paginate($this->controller_paginate());
        if (Auth::user()->hasRole('مدیر'))
        {
            $tours = TourForm::whereIn('cancel', ['active','cancel'])->orderByDesc('id');
            if ($id) {
                $tours = $tours->where('tour_id', $id);
            }
            $tours = $tours->paginate($this->controller_paginate());
        }
        $category = ServicePluse::whereIn('id', $tours->pluck('tour_id'))->get();
        $as_user  = User::whereIn('id',$tours->pluck('user_id'))->get();
        return view('user.tour.index', compact('tours','category','as_user'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function show($name)
    {
        function fa_number($number) {
            $arr = array();
            for ($i=0; $i < strlen($number); $i++) { 
                switch ($number) {
                    case $number[$i] == "0":
                        array_push($arr, "۰" );
                    break;
                    case $number[$i] == "1":
                        array_push($arr, "۱" );
                    break;
                    case $number[$i] == "2":
                        array_push($arr, "۲" );
                    break;
                    case $number[$i] == "3":
                        array_push($arr, "۳" );
                    break;
                    case $number[$i] == "4":
                        array_push($arr, "۴" );
                    break;
                    case $number[$i] == "5":
                        array_push($arr, "۵" );
                    break;
                    case $number[$i] == "6":
                        array_push($arr, "۶" );
                    break;
                    case $number[$i] == "7":
                        array_push($arr, "۷" );
                    break;
                    case $number[$i] == "8":
                        array_push($arr, "۸" );
                    break;
                    case $number[$i] == "9":
                        array_push($arr, "۹" );
                    break;
                
                    default:
                        array_push($arr, $number[$i] );
                } 
            }
            return implode("",$arr);
        } 
        $tour = ServicePluse::where('status', 'active')->where('slug', $name)->first();
        if ($tour) {
            $items = TourForm::where('tour_id',$tour->id)->where('cancel', 'waitingForPayment')->where('created_at', '<', Carbon::now()->subHours())->get();
            foreach ($items as $item) {
                $item->delete();
            }
            $items = TourAlbum::where('display',true)->where('file_id',$tour->id)->get();
            $tour->capacity = $tour->capacity - TourForm::where('tour_id', $tour->id)->count();
            // تعداد قابل ثبت در تور
            $tour->time     = fa_number(strval($tour->capacity));
            // قیمت هر بلیط
            $tour->price    = fa_number(strval(number_format($tour->price).' تومان '));
            $is_active      = true; 
            // بررسی تاریخ تور
            if (Carbon::parse($tour->start_tour)->diffInDays(Carbon::now(), false) >= 0) {
                $is_active  = false; 
            }
            return view('user.tour.show', compact('tour','items','is_active'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
        }
        abort(503, 'Tour Not Found');
    }

    public function create()
    {
        $items = ServicePluse::where('status', 'active')->get();
        return view('user.package.index', compact('items'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }
    
    public function edit($id)
    {
        if (Auth::user()->hasRole('مدیر'))
        {
            $tour = TourForm::findOrFail($id);
        } else {
            $tour = TourForm::where('user-id', auth()->user()->id)->findOrFail($id);
        }
        $tour->cancel = 'cancel';
        $tour->save();
        return back();
    }

    public function update(Request $request, $id) 
    {
        function fa_number($number) {
            $arr = array();
            for ($i=0; $i < strlen($number); $i++) { 
                switch ($number) {
                    case $number[$i] == "0":
                        array_push($arr, "۰" );
                    break;
                    case $number[$i] == "1":
                        array_push($arr, "۱" );
                    break;
                    case $number[$i] == "2":
                        array_push($arr, "۲" );
                    break;
                    case $number[$i] == "3":
                        array_push($arr, "۳" );
                    break;
                    case $number[$i] == "4":
                        array_push($arr, "۴" );
                    break;
                    case $number[$i] == "5":
                        array_push($arr, "۵" );
                    break;
                    case $number[$i] == "6":
                        array_push($arr, "۶" );
                    break;
                    case $number[$i] == "7":
                        array_push($arr, "۷" );
                    break;
                    case $number[$i] == "8":
                        array_push($arr, "۸" );
                    break;
                    case $number[$i] == "9":
                        array_push($arr, "۹" );
                    break;
                
                    default:
                        array_push($arr, $number[$i] );
                } 
            }
            return implode("",$arr);
        }
        $tour  = ServicePluse::findOrFail($id);
        $count = $request->count;
        $items = TourAlbum::where('display',true)->where('file_id',$tour->id)->get();
        $tour->capacity = $tour->capacity - TourForm::where('tour_id', $tour->id)->count();
        // تعداد قابل ثبت در تور
        $tour->time     = fa_number(strval($tour->capacity));
        // قیمت هر بلیط
        $tour->price    = fa_number(strval(number_format($tour->price).' تومان '));
        $is_active      = true; 
        // بررسی تاریخ تور
        if (Carbon::parse($tour->start_tour)->diffInDays(Carbon::now(), false) >= 0) {
            $is_active  = false; 
        }
        return view('user.tour.show', compact('is_active','tour','items','count'), ['title1' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function store(Request $request) 
    {
        $tour  = ServicePluse::findOrFail($request->id);
        if ( $request->count > ( $tour->capacity - TourForm::where('tour_id', $tour->id)->count() ) ) {
            $m = 'تعداد افراد از ظرفیت تور بیشتر میباشد لطفا مجددا امتحان کنید';
            return redirect()->route('user.ads-tours-show-guest',$tour->slug)->with(['status' => 'danger-600', "message" => $m]);    
        }
        $t = new Transaction();
        $t->user_id       = auth()->user()->id;
        $t->type          = "buy_tour";
        $t->factor_id     = $tour->id;
        $t->total         = intval($tour->price) * intval($request->count);
        $t->amount        = intval($tour->price) * intval($request->count);
        $t->final_amount  = intval($tour->price) * intval($request->count);
        $t->description   = "خرید بلیط تور ".$request->count." نفر هر نفر ".$tour->price;
        $t->save();
        if ($t && $t->id) {
            for ($i=1; $i <= $request->count ; $i++) { 
                $fn = strval("fn".$i);
                $ln = strval("ln".$i);
                $pn = strval("pn".$i);
                $en = strval("en".$i);
                $cm = strval("cm".$i);
                TourForm::create([
                    "tour_id"               => intval($tour->id),
                    "transaction_id"        => intval($t->id),
                    "user_id"               => auth()->user()->id,
                    "amount_each_person"    => $tour->price,
                    "number_of_list"        => $i,
                    "total_user"            => $request->count,
                    "first_name"            => $request->$fn,
                    "last_name"             => $request->$ln,
                    "number"                => $request->$pn,
                    "necessary_number"      => $request->$en,
                    "national_code"         => $request->$cm,
                ]); 
            }
            return redirect()->route('user.user-transaction.show',$t->id);
        }
        $m = 'مشگل در ارتباط با درگاه پرداخت لطفا دوباره امتحان کنید';
        return redirect()->route('user.ads-tours-show-guest',$tour->slug)->with(['status' => 'danger-600', "message" => $m]);
    } 

    public function destroy($id)
    {
        if (Auth::user()->hasRole('مدیر'))
        {
            TourForm::findOrFail($id)->delete();
            return back();
        }
        return false;
    }


}