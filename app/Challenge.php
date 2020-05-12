<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'challenge_title', 'challenge_information', 'default_entry_fee',
    ];

    public function joinChallenges() {
        return $this->hasMany(JoinChallenges::class);
    }

}
