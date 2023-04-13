<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollVote extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'poll_id' => 'int',
        'poll_question_id' => 'int',
        'poll_answer_id' => 'int',
        'user_id' => 'int',
    ];

    /**
     * Get the Poll Answers
     * @return BelongsTo <Poll Questions, >
     */  
    public function pollAnswers(): BelongsTo
    {
        return $this->BelongsTo(PollAnswer::class, 'poll_answer_id', 'id');
    }

}
