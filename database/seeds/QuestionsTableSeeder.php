<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Question::create([
            'user_id' => 1,
            'question_title' => '질문 있습니다.',
            'question_content' => '까먹었습니다.',
        ]);

        
        \App\Question::create([
            'user_id' => 2,
            'question_title' => '궁금한 점',
            'question_content' => 'Waistand 수량은?',
        ]);
    }
}
