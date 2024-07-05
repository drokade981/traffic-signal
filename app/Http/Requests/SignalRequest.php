<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sequence.*' => 'required|digits:1|numeric|distinct'
        ];
    }

    public function attributes()
    {
        return [
            'sequence.*' => 'Sequence'
        ];
    }
}