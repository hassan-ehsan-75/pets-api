<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'age'=>'required',
            'color'=>'required',
            'type_id'=>'required|numeric|exists:pet_types,id',
            'customer_id'=>'required|numeric|exists:users,id',
            'photo'=>'nullable',
        ];
    }
}
