<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollAssigned extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'poll_id',
        'user_id',
    ];

    /**
     * Get the category detail
     * @return BelongsTo<Category  >
     */  
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    /**
     * Get the category detail
     * @return BelongsToMany<Category  >
     */  
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category detail
     * @return BelongsTo<Category  >
     */  
    public function scopeAssignedPolls($query)
    {
        return $query->join('polls', 'poll_assigneds.poll_id', '=', 'polls.id');
    }
}
