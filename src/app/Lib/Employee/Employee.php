<?php

namespace App\Lib\Employee;

use App\Base\BaseEntity;
use App\Base\HasUniqueCodeTrait;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Employee extends BaseEntity
{
    use HasFactory, HasUniqueCodeTrait, SoftDeletes;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
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
        'date_of_birth' => 'date',
    ];

    /**
     * @return bool|null
     * @throws Exception
     */
    public function delete(): ?bool
    {
        $this->email_address = Hash::make(random_bytes(100));
        $this->contact_number = Hash::make(random_bytes(100));

        return parent::delete();
    }

    /**
     * @param EmployeeAddress $newAddress
     * @return $this
     * @throws Exception
     */
    public function saveAddress(EmployeeAddress $newAddress) : self
    {
        if ($this->getAddress()->exists && $newAddress->is($this->getAddress())) {
            return $this;
        }

        try {
            DB::beginTransaction();

            // Using the repo here instead of the relationship as the relationship is "faked" to be one-to-one
            // This function here makes sure that there is only ever one non-soft deleted instance, the relationship doesn't need to know otherwise
            foreach (EmployeeAddressRepository::getAllAddressesForEmployee($this) as $address) {
                $address->delete();
            }
            $newAddress->setEmployee($this);
            $newAddress->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $this->refresh();
    }

    /**
     * @param Collection $skills
     * @return self
     */
    public function saveSkills(Collection $skills) : self
    {
        // First delete skills no longer there:
        $this->getSkills()->whereNotIn('skill_name', $skills->pluck('skill_name'))
            ->each(function (EmployeeSkill $skill) {
            $skill->delete();
        });

        // Then upsert reset of the skills:
        $this->skills()->upsert($skills->toArray(), ['skill_name', 'employee_id']);


        return $this->refresh();
    }

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
     * @return HasOne
     */
    public function address() : HasOne
    {
        return $this->hasOne(EmployeeAddress::class);
    }

    /**
     * @return HasMany
     */
    public function skills() : HasMany
    {
        return $this->hasMany(EmployeeSkill::class);
    }
}
