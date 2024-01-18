<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $login
 * @property string $password
 */
class SignInRequest extends FormRequest
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
            'login' => 'required|min:2',
            'password' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Пожалуйста, введите логин',
            'login.min' => 'Поле логин не может быть короче двух символов',
            'password.required' => 'Пожалуйста, введите пароль',
            'password.min' => 'Пароль не может быть короче четырёх символов'
        ];
    }
}
