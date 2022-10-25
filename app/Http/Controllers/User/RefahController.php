<?php

namespace App\Http\Controllers\User;

use App\Activity;
use App\Model\ServiceFactor;
use App\Model\RefahCurl;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Transaction;
use Gateway;
use Illuminate\Support\Facades\Cookie;

class RefahController extends Controller
{

    public function pay($id,$type)
    {
        $factor=ServiceFactor::find($id);
        if(!is_null($factor->total))
        {
            $total=$factor->total* 10;
        }
        else {
            $total=$factor->all_price* 10;
        }
//        $total=1000* 10;
        $price = $total;
        $callBackUrl = route('user.refah.verify');
        $token = '98738469-a8dd-4d5a-99b1-288e01c3a10e';
        $level1= json_decode(RefahCurl::request_payment_token($total,$callBackUrl));
        if(!$level1 || !$level1->Success)
        {
            return redirect('/')->with('err_message', 'خطایی رخ داده(مرحله1)');
        }
        $level1=$level1->Content;
        try {
            $data = Transaction::where('factor_id', $id)->where('status',0)->where('type',$type)->first();
            if (!is_null($data)) {
                $data->delete();
            }

            $item = new Transaction();
            $item->user_id=auth()->user()->id;
            $item->factor_id=$id;
            $item->total=$total/10;
            $item->transaction_id=$level1->payment_token;
            $item->type=$type;
            $item->bank_name='refah';
            $item->save();
            echo '<form name="myform" action="https://ipg.kipaa.ir" method="POST">
                        <input type="hidden" id="payment_token" name="payment_token" value="' . $level1->payment_token . '">
                    </form>
                        <script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';

        } catch (Exception $e) {
            return redirect('/')->with('err_message', 'خطایی در اتصال به درگاه رخ داده');
        }
    }


    public function verify(Request $request)
    {
        if($request->state==103)
        {
            $item=Transaction::where('transaction_id',$request->payment_token)->first();
            $factor=ServiceFactor::find($item->factor_id);
            $factor->pay_status="cancel";
            $factor->save();
            auth()->loginUsingId($item->user_id, true);
            return redirect()->route('user.index')->with('err_message', 'عملیات لغو شد');
        }
        try {
            if($request->state==100)
            {
                $item=Transaction::where('transaction_id',$request->payment_token)->first();
                $item->tracing_code=$request->reciept_number;
                $item->status=1;
                $item->save();
                $level2= json_decode(RefahCurl::verify_transaction($request->payment_token,$request->reciept_number));
                if(!$level2 || !$level2->Success)
                {
                    return redirect('/')->with('err_message', 'خطایی رخ داده(مرحله2)');
                }
                $rep2=$level2->Content;

                if(isset($rep2->Amount))
                {
                    $item->amount=$rep2->Amount/10;
                }
                else {
                    $item->creditamount=$item->total;
                }
                if(isset($rep2->CreditAmount))
                {
                    $item->creditamount=$rep2->CreditAmount/10;
                }
                else {
                    $item->creditamount=$item->total;
                }
                if(isset($rep2->CashAmount))
                {
                    $item->cashamount=$rep2->CashAmount/10;
                }
                else {
                    $item->cashamount=0;
                }
                $item->save();
                $level3= json_decode(RefahCurl::confirm_transaction($item->transaction_id,$item->tracing_code));
                if(isset($level3->Success) and !$level3->Success)
                {
                    return redirect('/')->with('err_message', 'خطایی رخ داده(مرحله3)');
                }
                $rep3=$level3->Content;
                if(!isset($rep3->ConfirmTransactionNumber))
                {
                    return redirect('/')->with('err_message', 'تاییدیه از سمت سرور ارسال نشد ');
                }
                $item->confirmtransactionnumber=$rep3->ConfirmTransactionNumber;
                $item->save();
            }
            //factor save
            $factor=ServiceFactor::find($item->factor_id);
            $factor->status="pending";
            $factor->pay_status="credit";
            $factor->update();
            $off_code=OffCode::where('code',$factor->off_code)->first();
            if($off_code)
            {
                $off_code->used_num+=1;
                if(($off_code->used_num+1)>=$off_code->inventory)
                {
                    $off_code->used='yes';
                }
                $off_code->update();
            }
//                auth()->loginUsingId($item->user_id, true);
//            return 'موفق بود';
            return redirect('/')->with('flash_message',
                'ثبت نام شما با موفقیت انجام شد. شروع خدمات سدار کارت در روزهای آتی از طریق شرکت سدار به شما اطلاع می گردد.');

        } catch (Exception  $e) {
//            return 'نا موفق بود';
            return redirect()->route('user.index')->with('err_message', 'خطایی رخ داده مجددا تلاش کنید');
        }

    }

}