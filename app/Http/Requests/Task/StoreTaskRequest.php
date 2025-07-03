<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:tasks,name|max:100',
            'description' => 'nullable|string|max:255',
            'status_id' => 'required|exists:task_statuses,id',
            'assigned_to_id' => 'nullable|exists:users,id',
            'labels' => 'nullable|array',
            'labels.*' => 'exists:labels,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('task.validation.name.unique'),
            'name.max' => __('task.validation.name.max'),
            'description.max' => __('task.validation.description.max'),
        ];
    }
}
