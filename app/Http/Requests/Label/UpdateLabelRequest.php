<?php

namespace App\Http\Requests\Label;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:labels,name,' . ($this->label ? $this->label->id : 'NULL') . '|max:50',
            'description' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('label.validation.name.unique'),
            'name.max' => __('label.validation.name.max'),
            'description.max' => __('label.validation.description.max'),
        ];
    }
}
