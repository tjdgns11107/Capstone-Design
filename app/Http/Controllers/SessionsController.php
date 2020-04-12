<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionsRequest;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() {
        return view('sessions.create');
    }

    public function store(SessionsRequest $request) {
        if(! auth()->attempt($request->only('user_id', 'password'), $request->has('remember'))) {
            return back()->with('flash_message', '아이디 혹은 비밀번호가 맞지 않습니다.')->withInput();
        }

        return redirect()->intended('/');
    }

    public function destroy() {
        auth()->logout();
        
        return redirect('/');
    }
}
