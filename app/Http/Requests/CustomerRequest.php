<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CustomerRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email'.((request()->isMethod('post'))?'':','.$this->customer->id),
            'phone_number'=>'required|numeric|unique:users,phone_number'.((request()->isMethod('post'))?'':','.$this->customer->id),
            'password'=>['required',Password::min(8)->mixedCase()],
            'profile_photo'=>'nullable',
        ];
    }
}
