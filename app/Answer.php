<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'target_id', 'answer_content',
    ];

    public function question() {
        return $this->belongsTo(Question::class, 'target_id');
    }
}
