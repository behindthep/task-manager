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
            'name' => 'required|string|unique:tasks,name',
            'description' => 'nullable|string',
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
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The name of the Task',
                'required' => true,
            ],
            'description' => [
                'description' => 'The description of the Task',
                'required' => false,
            ],
            'status_id' => [
                'description' => 'The Status of the Task',
                'required' => true,
            ],
            'assigned_to_id' => [
                'description' => 'The Executor of the Task',
                'required' => false,
            ],
            'labels' => [
                'description' => 'The Labels of the Task',
                'required' => false,
            ],
            'labels.*' => [
                'description' => 'The Labels of the Task must be relevant',
                'required' => false,
            ],
        ];
    }
}
