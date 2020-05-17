<?php

use Illuminate\Database\Seeder;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Challenge::create([
            'challenge_user_id' => 1,
            'challenge_title' => '바른자세 챌린지',
            'challenge_information' => '챌린지에 참여해서 바른 자세습관을 형성하세요.',
            'default_entry_fee' => 10000,
        ]);
        
        \App\Challenge::create([
            'challenge_user_id' => 1,
            'challenge_title' => '스트레칭 챌린지',
            'challenge_information' => '꾸준한 스트레칭으로 허리 건강을 지키세요!',
            'default_entry_fee' => 10000,
        ]);
    }
}
