<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Model\About;
use App\Model\AboutJoin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function show()
    {
        $item=About::find(1);
        $items=AboutJoin::where('type','guide')->get();
        return view('user.guide.show',compact('item','items'));
    }

}
