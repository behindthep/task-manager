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
        $labelId = $this->label ? $this->label->id : 'NULL';
        return [
            'name' => "sometimes|required|unique:labels,name,$labelId|max:50",
            'description' => 'sometimes|nullable|string|max:255'
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
