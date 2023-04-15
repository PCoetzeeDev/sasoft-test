<?php

namespace App\Http\Requests;

use App\Lib\Employee\EmployeeRepository;
use App\Lib\Employee\EmployeeSkill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $employee = EmployeeRepository::findByCode($this->request->get('employee_code'));

        return [
            'basic.first_name' => 'required',
            'basic.last_name' => 'required',
            'basic.contact_number' => 'required|unique:employees,contact_number,' . $employee->id,
            'basic.email_address' => 'required|email|unique:employees,email_address,' . $employee->id,
            'basic.date_of_birth' => 'required|date',
            'address.street' => 'required',
            'address.city' => 'required',
            'address.postal_code' => 'required|numeric',
            'address.country' => 'required',
            'skills.*.skill_name' => 'sometimes|nullable',
            'skills.*.years_experience' => 'sometimes|nullable', Rule::in(EmployeeSkill::YEARS_EXPERIENCE),
            'skills.*.skill_rating' => 'sometimes|nullable|exists:skill_ratings,slug',
        ];
    }

    public function messages()
    {
        return [
            'basic.first_name.required' => 'First Name required',
            'basic.last_name.required' => 'Last Name required',
            'basic.contact_number.required' => 'Contact Number required',
            'basic.contact_number.unique' => 'Contact Number already in use',
            'basic.email_address.required' => 'Email required',
            'basic.email_address.email' => 'Email invalid',
            'basic.email_address.unique' => 'Email already in use',
            'basic.date_of_birth.required' => 'Date of Birth required',
            'basic.date_of_birth.date' => 'Invalid date',
            'address.street.required' => 'Street required',
            'address.city.required' => 'City required',
            'address.postal_code.required' => 'Postal Code required',
            'address.postal_code.numeric' => 'Postal Code can only be numeric',
            'address.country.required' => 'Country required',
        ];
    }
}
