<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('informations.changeInfo');
    }

    public function update(Request $request) {
        \App\User::where('user_id', '=', $request->user_id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('/');
    }
}
