<?php

namespace App\Lib\Employee;

use App\Base\ValueObjects\ValueObject;

class SkillRating extends ValueObject
{

    protected $table = 'skill_ratings';

    const SLUG_RATING_BEGINNER = 'beginner';
    const SLUG_RATING_INTERMEDIATE = 'intermediate';
    const SLUG_RATING_EXPERT = 'expert';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'name',
        'order',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

}
