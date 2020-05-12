<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $challenges = \App\Challenge::get();

        return view('challenges.index', [
            'challenges'=>$challenges,
            'menu'=>'챌린지'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challenges.create', [
            'menu' => '챌린지 생성',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Challenge::create([
            'challenge_title' => $request->title,
            'default_entry_fee' => $request->fee,
            'challenge_information' => $request->content,
        ]);

        $challenges = \App\Challenge::get();

        return view('challenges.index', [
            'challenges' => $challenges,
            'menu'=>'챌린지'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = \App\Challenge::where('id', '=', $id)->first();

        return view('challenges.show' ,compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $challenge = \App\Challenge::where('id', '=', $id)->first();

        return view('challenges.edit', [
            'challenge' => $challenge,
            'menu' => '챌린지 수정',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Challenge::where('id', '=', $id)->update([
            'challenge_title' => $request->title,
            'default_entry_fee' => $request->fee,
            'challenge_information' => $request->content,
        ]);

        $challenge = \App\Challenge::where('id', '=', $id)->first();

        return view('challenges.show' ,compact('challenge'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Challenge::where('id', '=', $id)->delete();
        
        $challenges = \App\Challenge::get();

        return view('challenges.index', [
            'challenges'=>$challenges,
            'menu'=>'챌린지'
        ]);
    }
}
