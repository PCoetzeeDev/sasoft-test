<?php

namespace App\Lib\Employee;

use App\Base\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAddress extends BaseEntity
{
    use HasFactory, SoftDeletes;

    protected $table = 'employee_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'city',
        'postal_code',
        'country',
        'employee_id',
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
     * @return Employee
     */
    public function getEmployee() : Employee
    {
        return $this->employee ?? new Employee();
    }

    /**
     * @param Employee $employee
     * @return $this
     */
    public function setEmployee(Employee $employee) : self
    {
        $this->employee()->associate($employee);

        return $this;
    }

    /**
     * @return BelongsTo
     */
    protected function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
