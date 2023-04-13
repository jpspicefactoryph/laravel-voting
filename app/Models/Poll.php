<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'desription',
        'is_published',
        'starts_at',
        'ends_at',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the category detail
     * @return HasOne<Category  >
     */  
    public function category(): HasOne
    {
        return $this->haseOne(Poll::class);
    }

    /**
     * Get the Poll Questions
     * @return HasMany<Questions>
     */  
    public function pollQuestions(): HasMany
    {
        return $this->HasMany(PollQuestion::class);
    }

    /**
     * Get the Poll Answers
     * @return HasMany<Answers>
     */  
    public function pollAnswers(): HasMany
    {
        return $this->HasMany(PollAnswer::class);
    }


    /**
     * Get the Poll Votes 
     * @return HasMany<Answers>
     */  
    public function pollVotes(): HasMany
    {
        return $this->HasMany(PollVote::class);
    }
    
    /**
     * Get the Poll Votes 
     * @return BelongsTo<Answers>
     */  
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'id', 'user_id');
    }
}
