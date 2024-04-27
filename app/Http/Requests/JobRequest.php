<?php

namespace App\Http\Requests;

use App\Enums\Job\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'company_id' => ['required', Rule::exists('companies', 'id')],
            'description' => ['required', 'string'],
            'requirement' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(Type::values())],
            'currency' => ['required', 'string'],
            'minimum_salary' => ['required', 'numeric', 'min:0', 'max:99999999'],
            'maximum_salary' => ['required', 'numeric', 'min:0', 'gte:minimum_salary', 'max:99999999'],
            'vacancies' => ['required', 'numeric'],
            'deadline' =>  ['required', 'date'],
            'office_time' => ['required',],
            'benefits' => ['nullable'],
        ];
    }
}
