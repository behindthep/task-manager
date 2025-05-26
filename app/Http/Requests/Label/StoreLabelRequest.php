<?php

namespace App\Http\Requests\Label;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:labels,name',
            'description' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('label.validation.name.unique'),
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The name of the Label',
                'required' => true,
            ],
            'description' => [
                'description' => 'The description of the Label',
                'required' => false,
            ],
        ];
    }
}
