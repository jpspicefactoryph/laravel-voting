<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Poll extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at',
        'user_id',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'int',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * Get the PollCategory
     * @return belongsTo<pollCategory  >
     */  
    public function pollCategory(): BelongsTo
    {
        return $this->belongsTo(PollCategory::class, 'id', 'poll_id');
    }

    /**
     * Get the Poll Questions
     * @return HasMany<Questions>
     */  
    public function pollQuestions(): HasMany
    {
        return $this->hasMany(PollQuestion::class, 'poll_id', 'id');
    }

    /**
     * Get the Poll Answers
     * @return HasMany<Answers>
     */  
    public function pollAnswers(): HasMany
    {
        return $this->hasMany(PollAnswer::class);
    }


    /**
     * Get the Poll Votes 
     * @return HasMany<Answers>
     */  
    public function pollVotes(): HasMany
    {
        return $this->hasMany(PollVote::class);
    }

    /**
     * Get the Poll Answers
     * @return HasMany<Answers>
     */  
    public function assignedUsers(): HasMany
    {
        return $this->hasMany(PollAssigned::class);
    }
    
    /**
     * Get the Poll Votes 
     * @return BelongsTo<Answers>
     */  
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /**
     * Get the Poll Questions
     * @return Int<Questions>
     */  
    public function scopeGetVoterCount($query)
    {
        return $query->select('polls.*')
            ->addSelect(DB::raw('COUNT(DISTINCT poll_votes.user_id) as voters_count'))
            ->leftJoin('poll_votes', 'poll_votes.poll_id', '=', 'polls.id')
            ->groupBy('polls.id');
    }

}
