<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $joins = \App\JoinChallenge::where('user_id', '=', $request->id)->get();

        return view('joinChallenges.index', [
            'joins' => $joins,
            'menu' => '챌린지 도전 현황',
        ]);

        return $join_challenges;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $challenge = \App\Challenge::where('id', '=', $request->id)->first();

        return view('joinChallenges.create', [
            'challenge' => $challenge,
            'menu' => '챌린지 도전',
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
        $joinChallenge = \App\JoinChallenge::create([
            'challenge_id' => $request->challenge_id,
            'user_id' => $request->user_id,
            'join_date' => $request->date,
            'join_term' => $request->term,
            'entry_fee' => $request->fee,
            'achivement' => 0,
        ]);

        $challenges = \App\Challenge::get();

        return view('challenges.index', [
            'challenges'=>$challenges,
            'menuName'=>'챌린지'
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
        $join = \App\JoinChallenge::where('id', '=', $id)->first();

        return view('joinChallenges.show' ,compact('join'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $join = \App\JoinChallenge::where('id', '=', $id)->first();

        return view('joinChallenges.edit', [
            'join' => $join,
            'menu' => '참여 챌린지 수정',
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
        \App\JoinChallenge::where('id', '=', $id)->update([
            'join_date' => $request->date,
            'join_term' => $request->term,
            'entry_fee' => $request->fee,
        ]);
        $join = \App\JoinChallenge::where('id', '=', $id)->first();

        return view('joinChallenges.show' ,compact('join'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        \App\JoinChallenge::where('id', '=', $request->id)->delete();
        $joins = \App\JoinChallenge::where('user_id', '=', $request->user_id)->get();

        return view('joinChallenges.index', [
            'joins' => $joins,
            'menu' => '챌린지 도전 현황',
        ]);

        return $join_challenges;
    }
}
