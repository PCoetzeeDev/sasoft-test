<?php

namespace App\Lib\Employee;

use App\Base\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends BaseEntity
{
    use HasFactory;

    protected $table = 'employees';

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
