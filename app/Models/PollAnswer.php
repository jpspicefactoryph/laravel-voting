<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollAnswer extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'poll_id' => 'int',
        'poll_question_id' => 'int',
    ];

    /**
     * Get the Poll Votes
     * @return HasMany <Poll Votes, >
     */  
    public function pollVotes(): HasMany
    {
        return $this->hasMany(PollVote::class, 'poll_answer_id');
    }

}
