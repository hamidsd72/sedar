<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slider extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function photo()
    {
        return $this->morphOne('App\Model\Photo', 'pictures')->where('device_type','desktop');
    }
    public function photo_mobile()
    {
        return $this->morphOne('App\Model\Photo', 'pictures')->where('device_type','mobile');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            $item->photo()->get()
                ->each(function ($photo) {
                    $path = $photo->path;
                    File::delete($path);
                    $photo->delete();
                });
            $item->photo_mobile()->get()
                ->each(function ($photo_mobile) {
                    $path = $photo_mobile->path;
                    File::delete($path);
                    $photo_mobile->delete();
                });
        });
    }
}
