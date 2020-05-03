<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Answer::create([
            'target_id' => 1,
            'answer_content' => '네.',
        ]);

        \App\Answer::create([
            'target_id' => 2,
            'answer_content' => '현재 n개 있습니다.',
        ]);
    }
}
