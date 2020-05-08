<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionsRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public function index()
    {
        $questions = \App\Question::get();

        return view('questions.index', [
            'questions' => $questions,
            'menu' => 'QnA',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create', [
            'menu' => '질문 등록',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request)
    {
        $question = \App\Question::create([
            'user_id' => $request->user_id,
            'question_title' => $request->title,
            'question_content' => $request->content,
        ]);

        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = \App\Question::where('id','=',$id)->first();
        $answer = \App\Answer::where('target_id', '=', $id)->first();

        if(isset($answer)) { // $answer이 있는 경우
            return view('questions.show', compact('question', 'answer'));
        }

        // 없는 경우
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = \App\Question::where('id','=',$id)->first();

        return view('questions.edit', [
            'question' => $question,
            'menu' => '질문 수정',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, $id)
    {
        $question = \App\Question::where('id', '=', $id)->update([
            'question_title' => $request->title,
            'question_content' => $request->content,
        ]);

        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Question::where('id','=',$id)->delete();

        return $id;
    }
}
