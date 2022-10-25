<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ServicePlus extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function service()
    {
        return $this->belongsTo('App\Model\Service','service_id');
    }
    public static function type($type)
    {
        switch ($type){
            case 'hour':
                return 'ساعت';
                break;
            case 'min':
                return 'دقیقه';
                break;
            case 'meet':
                return 'جلسه';
                break;
            default:
                return '';
                break;
        }
    }
}
