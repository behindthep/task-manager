<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|unique:tasks,name,' . ($this->task ? $this->task->id : 'NULL') . '|max:100',
            'description' => 'sometimes|nullable|string|max:255',
            'status_id' => 'sometimes|integer|exists:task_statuses,id',
            'assigned_to_id' => 'sometimes|nullable|exists:users,id',
            'labels' => 'sometimes|array',
            'labels.*' => 'integer|exists:labels,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('task.validation.name.unique'),
            'name.max' => __('task.validation.name.max'),
            'description.max' => __('task.validation.description.max'),
            'status_id.exists' => __('task.validation.status_id.exists'),
        ];
    }
}
