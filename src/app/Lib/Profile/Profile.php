<?php

namespace App\Lib\Profile;

use App\Base\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends BaseEntity
{
    use HasFactory, SoftDeletes;

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'profile_type_id',
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

    /**
     * @return ProfileType
     */
    public function getProfileType() : ProfileType
    {
        return $this->profile_type ?? new ProfileType();
    }
    /**
     * @return BelongsTo
     */
    protected function profile_type() : BelongsTo
    {
        return $this->belongsTo(ProfileType::class);
    }
}
