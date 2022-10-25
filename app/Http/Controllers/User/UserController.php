<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($myuser)
    {
        //
    }

    public function edit($myuser)
    {
        //
    }

    public function update(Request $request, $myuser)
    {
        dd($request->all());
        $this->validate($request, [
            'locale'     => ['string', 'max:2'],
            'first_name'     => ['string', 'max:255'],
            'last_name'     => ['string', 'max:255'],
            'email'    => ['string', 'email', 'max:255', 'unique:users'],
        ]);
        $user = User::find(auth()->user()->id);

        if ($request->first_name) {
            $user->first_name = $request->first_name;
        }

        if ($request->locale) {
            $user->locale = $request->locale;
        }

        if ($request->last_name) {
            $user->last_name  = $request->last_name;
        }

        if ($request->email) {
            $user->email      = $request->email;
        }

        $user->update();
        return redirect()->route('user.index');
    }

    public function destroy($myuser)
    {
        //
    }
}