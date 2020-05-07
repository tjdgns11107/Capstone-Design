<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnswersRequest;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $question = \App\Question::where('id', '=', $request->id)->first();

        return view('answers.create', [
            'question' => $question,
            'menu' => '답변 등록',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswersRequest $request)
    {
        $answer = \App\Answer::create([
            'target_id' => $request->id,
            'answer_content' => $request->content,
        ]);

        return $answer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = \App\Answer::where('id', '=', $id)->first();
        
        return view('answers.edit', [
            'answer' => $answer,
            'menu' => '답변 수정',
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
        \App\Answer::where('id', '=', $id)->update([
            'answer_content' => $request->content,
        ]);

        $answer = \App\Answer::where('id', '=', $id)->first();
        $question = \App\Question::where('id','=',$answer->target_id)->first();
        
        return view('questions.show', compact('question', 'answer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ques = \App\Answer::where('id','=',$id)->first()->target_id;
        \App\Answer::where('id','=',$id)->delete();
        $question = \App\Question::where('id','=',$ques)->first();

        return view('questions.show', compact('question'));
    }
}
