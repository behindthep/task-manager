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
            'name' => 'required|unique:task_statuses,name|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('task_status.validation.name.unique'),
            'name.max' => __('task_status.validation.name.max'),
        ];
    }
}
