<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
        "user_id",
        "type",
        "factor_id",
        "total",
        "amount",
        "final_amount",
        "description",
    ];

    public function factor() 
    {
        return $this->belongsTo('App\Model\ServiceFactor','factor_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public static function pay($type)
    {
        switch ($type){
            case '1':
                return '<span class="badge bg-success ml-1">پرداخت موفق</span>';
                break;
            case '0':
                return '<span class="badge bg-danger ml-1">پرداخت ناموفق</span>';
                break;
            default:
                return '';
                break;
        }
    }
    public static function replace($type)
    {
        return str_replace('A00000000000000000000000000','',$type);
    }
}
