<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollQuestion extends Model
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
        'poll_question_type_id' => 'int',
    ];


    /**
     * Get the Poll Answers
     * @return HasMany <Poll Questions, >
     */  
    public function pollAnswers(): HasMany
    {
        return $this->hasMany(PollAnswer::class);
    }



}
