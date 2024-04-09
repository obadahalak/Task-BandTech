<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserType;
use App\Rules\UserTypeRule;
use App\helpers\ApiResponse;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'min:3', 'max:15'],
            'avatar' => ['required','image','max:500000'],
            'type' => ['required',Rule::in([UserType::NORMAL, UserType::GOLD, UserType::SILVER])],
            'password' => ['sometimes', 'required', 'min:3', 'max:30', 'confirmed'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);
    }
}
