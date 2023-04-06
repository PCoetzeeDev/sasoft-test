<?php

namespace App\Lib\Profile;

use App\Base\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends BaseEntity
{
    use HasFactory;

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

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
