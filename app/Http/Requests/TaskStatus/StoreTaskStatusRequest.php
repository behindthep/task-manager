<?php

namespace App\Http\Requests\TaskStatus;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:task_statuses,name'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('task_status.validation.name.unique'),
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The name of the Task Status',
                'required' => true,
            ],
        ];
    }
}
