<?php


namespace App\Http\Controllers\User;

use App\User;
use App\Model\OffCode;
use App\Model\Service;
use App\Model\ServiceJoinPackage;
use App\Model\ServicePackage;
use App\Model\Basket;
use App\Model\BasketFactor;
use App\Model\Transaction;
use App\Model\ServiceFactor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller 

{
    public static function index()
    {
        $bascket = Basket::where('user_id',auth()->user()->id)->where('status', 'active')->where('type', 'package')->pluck('sale_id');
        $items = ServicePackage::whereIn('id', $bascket)->where('status', 'active')->get();
        return view('user.package.index', compact('items'));
    }

    public static function getBasket()
    {
        $basket_show = [];
        $service_id=[];
        $package_id=[];
        $service_del_id=[];
        $service_del=null;
        $all_price = 0;
        $order_code = 0;
        if (!Cookie::has('order_code')) {
            $order_code = time();
            Cookie::queue('order_code', $order_code, 60);
        } else {
            $order_code = Cookie::get('order_code');
        }
        if (Cookie::has('basket')) {
            $basket = json_decode(Cookie::get('basket'));
            //check service in package
            foreach ($basket as $val1) {
                if($val1->type=='service')
                {
                    array_push($service_id,$val1->sale_id);
                }
                else
                {
                    array_push($package_id,$val1->sale_id);
                }
            }
            $package_join=ServiceJoinPackage::whereIn('package_id',$package_id)->get();
            $i_key=0;
            foreach ($package_join as $package_jo)
            {
                if(in_array($package_jo->service_id,$service_id))
                {
                    $service_del_check=Service::find($package_jo->service_id);
                    if($service_del_check)
                    {
                        array_push($service_del_id,$service_del_check->id);
                        $service_del.=$i_key>0?',':'';
                        $service_del.=$service_del_check->title;
                        $i_key+=1;
                    }
                }
            }
            //check service in package
            foreach ($basket as $val) {
                if($val->type=='service')
                {
                    $service = Service::where('id', $val->sale_id)->where('status', 'active')->first();
                    if ($service && !in_array($service->id,$service_del_id)) {
                        array_push($basket_show, ['item' => $service,'sale_id'=>$service->id,'type' => 'service', 'order_code' => (int)$order_code]);
                    }
                }
                else
                {
                    $package = ServicePackage::where('id', $val->sale_id)->where('status', 'active')->first();
                    if ($package) {
                        array_push($basket_show, ['item' => $package,'sale_id'=>$package->id,'type' => 'package', 'order_code' => (int)$order_code]);
                    }
                }
            }
            if(count($service_del_id))
            {
                Cookie::queue('basket', json_encode($basket_show), 60);
            }
            if (count($basket_show) > 0) {
                foreach ($basket_show as $value) {
                    if ($value['type']=='service') {
                        $all_price+=$value['item']->price;
                    } else {
                        $all_price+= $value['item']->price;
                    }
                }
            }
        }
        return [$basket_show,$all_price,$service_del_id,$service_del];
    }

    public function level_1()
    {
        if(auth()->check())
        {
            $getBasketArray = $this->getBasket();
            $baskets = $getBasketArray[0];
            $all_price = $getBasketArray[1];
            $service_del_id = $getBasketArray[2];
            $service_del = $getBasketArray[3];
            $count_basket1=count($baskets);
            $msg_basket=null;
            if(count($service_del_id))
            {
                $msg_basket.='تعداد ';
                $msg_basket.=count($service_del_id);
                $msg_basket.='  به علت موجود بودن سرویس در پکیج درون سبد خرید فعلی حذف گردید(';
                $msg_basket.=$service_del;
                $msg_basket.=')';
            }
            return view('user.basket.level_1',compact('baskets','all_price','service_del_id','service_del','count_basket1','msg_basket'));
        }
        return redirect()->back()->with('err_message', 'ابتدا وارد حساب کاربری خود شوید');
    }

    public function add_basket($id,$type,Request $request)
    {
        $old_items = Basket::where('user_id',auth()->user()->id)->where('sale_id',$id)->where('type',$type)->where('status','!=','active')->get();
        
        foreach ($old_items as $item) {
           $item->delete();
        }

        try {
            if (Basket::where('user_id',auth()->user()->id)->where('sale_id',$id)->where('type',$type)->where('status','active')->count()) {
                return redirect()->back()->with('err_message', ' در کارگاه های فعلی موجود می باشد');
            }
            if ($type=='package') {
                $item = ServicePackage::findOrFail($id);
                $basket = new Basket();
                $basket->user_id    = auth()->user()->id;
                $basket->sale_id    = $id;
                $basket->type       = $type;
                $basket->type       = $type;
                $basket->status     = 'active';
                $basket->price      = 0;
                if ($item->price && $item->price > 0 ) {
                    $basket->status     = 'pending';
                    $basket->price      = intval($item->price);
                    $basket->save();

                    $t = new Transaction();
                    $t->user_id       = auth()->user()->id;
                    $t->type          = "package";
                    $t->factor_id     = $basket->id;
                    $t->total         = intval($item->price);
                    $t->amount        = intval($item->price);
                    $t->final_amount  = intval($item->price);
                    $t->description   = "خرید گارگاه {{$item->title}} به مبلغ {{$item->price}} تومان";
                    $t->save();
                    return redirect()->route('user.user-transaction.show',$t->id);
                }
                $basket->save();
                
            }
            return redirect()->route('user.basket_index');
        } catch (Exception $e) {
            return redirect()->back()->with('err_message', 'خطایی در افزودن به سبد خرید رخ داده');
        }

//         if($type=='service')
//         {
//             $item = Service::where('id', $id)->where('status', 'active')->select('id','category_id','title','slug','price','status')->first();
//         }
//         else
//         {
//             $item = ServicePackage::where('id', $id)->where('status', 'active')->select('id','title','slug','price','status','pic_card','type')->first();
//         }
//         // not item
//         if (!$item) {
//             return redirect()->back()->with('err_message', 'موردی یافت نشد');
//         }
//         $basket = Cookie::get('basket');
//         $order_code = 0;
//         try {
//             if (!Cookie::has('order_code')) {
//                 $order_code = time();
//                 Cookie::queue('order_code', $order_code, 60);
//             } else {
//                 $order_code = Cookie::get('order_code');
//             }
//             if (!Cookie::has('basket')) {
//                 $basket_show = [];
//                 if ($type == 'service') {
//                     array_push($basket_show, ['item' => $item, 'sale_id' => $item->id, 'type' => 'service', 'order_code' => (int)$order_code]);
//                 } else {
//                     array_push($basket_show, ['item' => $item, 'sale_id' => $item->id, 'type' => 'package', 'order_code' => (int)$order_code]);
//                 }
//                 Cookie::queue('order_code', $order_code, 60);
//                 Cookie::queue('basket', json_encode($basket_show), 60);

//             } else {
//                 $package_id=[];
//                 $basket = json_decode($basket);
//                 $exist = false;
//                 $exist_new = false;
//                 foreach ($basket as $value) {
//                     if($type=='service' && $value->type=='service')
//                     {
//                         $item_s = Service::where('id', $id)->where('status', 'active')->first();
//                         if ($value->sale_id == $item_s->id) {
//                             $exist = true;
//                         }
//                     }
//                     elseif($type=='package' && $value->type=='package')
//                     {
//                         $item_p = ServicePackage::where('id', $id)->where('status', 'active')->first();
//                         if ($value->sale_id == $item_p->id) {
//                             $exist = true;
//                         }
//                     }
//                     if($value->type=='package')
//                     {
//                         array_push($package_id,$value->sale_id);
//                     }
//                 }
// //                service check in package
//                 if($type=='service')
//                 {
//                     $package_joins=ServiceJoinPackage::whereIn('package_id',$package_id)->where('service_id',$item->id)->select('package_id')->get()->toArray();
//                     if(count($package_joins))
//                     {
//                         $exist=true;
//                         $exist_new=true;
//                     }
//                 }

//                 if (!$exist) {
//                     if ($type == 'service') {
//                         array_push($basket, ['item' => $item, 'sale_id' => $item->id, 'type' => 'service', 'order_code' => (int)$order_code]);
//                     } else {
//                         array_push($basket, ['item' => $item, 'sale_id' => $item->id, 'type' => 'package', 'order_code' => (int)$order_code]);
//                     }
//                     Cookie::queue('basket', json_encode($basket), 60);
//                     return redirect()->back()->with('flash_message', ' به سبد خرید شما اضافه گردید');
//                 } else {
//                     if($exist_new)
//                     {
//                         return redirect()->back()->with('err_message', ' در پکیج های خرید فعلی موجود می باشد');
//                     }
//                     return redirect()->back()->with('err_message', ' در سبد خرید شما موجود می باشد');
//                 }
//             }
//             return redirect()->back()->with('flash_message', 'به سبد خرید شما اضافه گردید');
//         } catch (Exception $e) {
//             return redirect()->back()->with('err_message', 'خطایی در افزودن به سبد خرید رخ داده');
//         }
    }

    public function del_basket($id,$type)
    {
        try {
            if (!Cookie::has('order_code')) {
                $order_code = time();
                Cookie::queue('order_code', $order_code, 60);
            } else {
                $order_code = Cookie::get('order_code');
            }
            if (Cookie::has('basket')) {
                $basket = json_decode(Cookie::get('basket'));
                $basket_show=[];
                $remove = false;
                foreach ($basket as $key => $value) {
                    if ($value->sale_id == $id && $value->type==$type) {
                        if (count($basket) <= 1) {
                            $basket = [];
                        } else {
                            unset($basket[$key]);
                        }
                        $remove = true;
                    }
                    else
                    {
                        array_push($basket_show, ['item' => $value->item, 'sale_id' => $value->sale_id, 'type' => $value->type, 'order_code' => (int)$order_code]);
                    }
                }
                if ($remove) {
                    Cookie::queue('basket', json_encode($basket_show), 60);
                    return redirect()->back()->with('flash_message', 'از سبد خرید حذف شد');
                } else {
                    return redirect()->back()->with('err_message', 'یافت نشد');
                }
            } else {
                return redirect()->back()->with('err_message', 'سبد خرید شما خالی می باشد');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('err_message', 'خطایی در حذف از سبد خرید رخ داده');
        }
    }

    public function off_check($code)
    {
        $getBasketArray = $this->getBasket();
        $all_price = $getBasketArray[1];
        $off_code=OffCode::where('code',$code)->where('status','active')->first();
        //isset code
        if($off_code)
        {
            // not used code
            if($off_code->used=='no')
            {
                // used code all user
                if($off_code->user_id==0)
                {
                    $factor=BasketFactor::where('user_id',Auth::user()->id)->where('off_code',$code)->where('status','active')->first();
                    //used user code all user
                    if($factor)
                    {
                        return
                            [
                                'type'=>'danger',
                                'msg'=>'کد تخفیف توسط شما استفاده شده',
                            ];
                    }
                    $total=$all_price-($all_price*$off_code->percent)/100;
                    return
                        [
                            'type'=>'success',
                            'percent'=>$off_code->percent,
                            'total'=>$total,
                            'off_total'=>$all_price-$total,
                            'msg'=>'کد تخفیف اعمال شد('.$off_code->percent.'%)',
                        ];
                }
                // used code personal user
                else {
                    if($off_code->user_id==Auth::user()->id) {
                        $total=$all_price-($all_price*$off_code->percent)/100;
                        return
                            [
                                'type'=>'success',
                                'percent'=>$off_code->percent,
                                'total'=>$total,
                                'off_total'=>$all_price-$total,
                                'msg'=>'کد تخفیف اعمال شد('.$off_code->percent.'%)',
                            ];
                    }
                    else {
                        return
                            [
                                'type'=>'danger',
                                'msg'=>'کد تخفیف اشتباه می باشد',
                            ];
                    }
                }
            }
            // used code Check out the credit
            else {
                return
                    [
                        'type'=>'danger',
                        'msg'=>'اعتبار کد تخفیف به اتمام رسیده',
                    ];
            }
        }
        // not code
        else {
            return
                [
                    'type'=>'danger',
                    'msg'=>'کد تخفیف اشتباه می باشد',
                ];
        }
    }
    public function level_2(Request $request)
    {
        $getBasketArray = $this->getBasket();
        $baskets = $getBasketArray[0];
        $all_price = $getBasketArray[1];
        if(count($baskets)<=0)
        {
            return redirect()->route('user.basket.list')->with('err_message','سبد خرید شما خالی می باشد');
        }
        $user = Auth::user();
        //off_code_check
        $off_code=$request->off_code_basket;
        $sum_off_price=$all_price;
        if(!is_null($off_code))
        {
            $check_off=$this->off_check($off_code);
            if($check_off['type']=="success")
            {
                $off_code=$request->off_code_basket;
                $sum_off_price=$check_off['total'];
            }
            else
            {
                $off_code=null;
            }
        }

        //insert factor
        $factor = new BasketFactor();
        $factor->user_id = $user->id;
        $factor->bank_name = $request->bank_name;
        $factor->sum_price = $all_price;
        $factor->off_code = $off_code;
        $factor->sum_off_price = $sum_off_price;
        $factor->save();
        //insert basket
        foreach ($baskets as $basket) {
            if($basket['type']=="service")
            {
                $item=Service::find($basket['sale_id']);
            }
            else
            {
                $item=ServicePackage::find($basket['sale_id']);
            }
            if (is_null($item)) {
                return redirect()->back()->with('err_message', 'سبد خرید شما یافت نشد لطفا سبد خرید خود را حذف و مجددا ثبت نمایید');
            }
            try {
                $basket_set = new Basket();
                $basket_set->user_id = $user->id;
                $basket_set->sale_id = $item->id;
                $basket_set->type = $basket['type'];
                $basket_set->price = $item->price;
                $basket_set->factor_id = $factor->id;
                $basket_set->save();

            }catch (\Exception $e) {
                return redirect()->back()->with('err_message', 'خطایی در ثبت سبد خرید رخ داد، لطفا مجددا امتحان کنید');
            }
        }
        if($factor->sum_off_price==0)
        {
            $factor->status='active';
            $baskets=Basket::where('factor_id',$factor->id)->get();
            foreach ($baskets as $basket)
            {
                $basket->status='active';
                $basket->update();
                if($basket->type=='service')
                {
                    $item=Service::find($basket->sale_id);
                }
                else
                {
                    $item=ServicePackage::find($basket->sale_id);
                }
                if($item)
                {
                    $item->sale_count+=1;
                    $item->update();
                }
            }
            $factor->update();

            $item = new Transaction();
            $item->user_id=auth()->user()->id;
            $item->factor_id=$factor->id;
            $item->total=$factor->sum_off_price;
            $item->transaction_id='000';
            $item->type='factor';
            $item->status=1;
            $item->tracing_code='000';
            $item->save();
            $basket_show125=[];
            $order_code125=0;


            Cookie::queue('basket', json_encode($basket_show125), 1);
            Cookie::queue('order_code', json_encode($order_code125), 1);
            if (Cookie::has('basket')) {
                Cookie::queue(Cookie::forget('basket'));
            }
            if (Cookie::has('order_code')) {
                Cookie::queue(Cookie::forget('order_code'));
            }
            $off_code_set=OffCode::where('code',$factor->off_code)->first();

            foreach ($baskets as $basket)
            {
                if($basket->type=='service')
                {
                    $item=Service::find($basket->sale_id);
                }
                else
                {
                    $item=ServicePackage::find($basket->sale_id);
                }
                $ServiceFactor = new ServiceFactor();
                $ServiceFactor->user_id=auth()->user()->id;
                $ServiceFactor->all_price= $factor->sum_off_price;
                $ServiceFactor->total= $factor->sum_off_price;
                $ServiceFactor->status = "active";
                $ServiceFactor->pay_status = "paid";
                $ServiceFactor->package_id = $item->id;
                $ServiceFactor->custom = 0;
                $ServiceFactor->type = $basket->type;
                if($off_code_set) {
                    $ServiceFactor->off_code = $factor->off_code;
                }
                $ServiceFactor->save();
            }

            if($off_code_set)
            {
                if(($off_code_set->used_num+1) >= $off_code_set->inventory)
                {
                    $off_code_set->used='yes';
                }
                $off_code_set->used_num+=1;
                $off_code_set->update();
            }

            if($basket->type=='service')
            {
                $item = Service::find($basket->sale_id);
                return redirect()->route('user.service',[$item->id,$item->slug])->with('flash_message','خرید شما با موفقیت انجام شد');
            }
            else
            {
                $item = ServicePackage::find($basket->sale_id);
                return redirect()->route('user.package',[$item->slug])->with('flash_message','خرید شما با موفقیت انجام شد');
            }

            return redirect()->route('admin.service.buy.list')->with('flash_message','خرید شما با موفقیت انجام شد');
        }
        return redirect()->route('user.zarinpal.pay.new',[$factor->id,auth()->user()->id]);
    }

}
