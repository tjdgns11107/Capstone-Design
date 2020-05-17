<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'challenge_user_id', 'challenge_title', 'challenge_information', 'default_entry_fee',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'challenge_user_id');
    }

    public function joinChallenges() {
        return $this->hasMany(JoinChallenges::class);
    }

}
