<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        "id",
        "user_id",
        "status",
        "subject",
        "description",
        "atach",
        "created_at",
        "updated_at",
    ];
}

