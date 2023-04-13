<?php

namespace App\Lib\Employee;

use App\Base\BaseEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends BaseEntity
{
    use HasFactory;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'email_address',
        'date_of_birth',
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
    protected $casts = [
        'date_of_birth' => 'timestamp',
    ];

    /**
     * @return EmployeeAddress
     */
    public function getAddress() : EmployeeAddress
    {
        return $this->address ?? new EmployeeAddress();
    }

    /**
     * @return Collection<EmployeeSkill>
     */
    public function getSkills() : Collection
    {
        return $this->skills ?? new Collection();
    }

    /**
     * @return BelongsTo
     */
    protected function address() : BelongsTo
    {
        return $this->belongsTo(EmployeeAddress::class);
    }

    /**
     * @return BelongsToMany
     */
    protected function skills() : BelongsToMany
    {
        return $this->belongsToMany(EmployeeSkill::class);
    }
}
