<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function create() {
        return view('users.create');
    }

    public function store(UsersRequest $request) {
        $user = \App\User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        if(! $user) {
            return back()->with('flash_message', '회원가입을 실패하였습니다.')->withInput();
        }

        auth()->login($user);

        return redirect('/')->with('flash_message', '회원가입을 성공하였습니다.');
    }
}
