<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Network extends Model
{
    protected $table = 'networks';

    protected $fillable = [
        "id",
        "name",
        "status",
        "address",
        "config",
        "sort",
        "created_at",
        "updated_at",
    ];
}
