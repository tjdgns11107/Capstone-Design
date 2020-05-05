<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinChallenge extends Model
{
    public $fillable = [
        'challenge_id', 'user_id', 'join_date', 'join_term', 'entry_fee', 'achivement',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function challenge() {
        return $this->belongsTo(Challenge::class, 'challenge_id');
    }
}
