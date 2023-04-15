<?php

namespace App\Lib\Employee;

use App\Base\BaseEntity;
use App\Base\ValueObjects\ValueObject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeSkill extends BaseEntity
{
    protected $table = 'employee_skills';

    const SKILL_NAMES = [
        'PHP' => 'PHP',
        'Vue' => 'Vue',
        'React' =>'React',
        'Git' => 'Git',
        'Rust' => 'Rust',
        'Python' => 'Python',
        'Elixir' => 'Elixir',
        'C#' => 'C#',
    ];

    const YEARS_EXPERIENCE = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5+' => '5+',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_name',
        'years_experience',
        'employee_id',
        'skill_rating_id',
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
     * @param ValueObject $skillRating
     * @return $this
     */
    public function setSkillRating(ValueObject $skillRating) : self
    {
        $this->skill_rating()->associate($skillRating);

        return $this;
    }

    /**
     * @return SkillRating
     */
    public function getSkillRating() : SkillRating
    {
        return $this->skill_rating ?? new SkillRating();
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
     * @return Employee
     */
    public function getEmployee() : Employee
    {
        return $this->employee ?? new Employee();
    }

    /**
     * @return BelongsTo
     */
    protected function skill_rating() : BelongsTo
    {
        return $this->belongsTo(SkillRating::class);
    }

    /**
     * @return BelongsTo
     */
    protected function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
