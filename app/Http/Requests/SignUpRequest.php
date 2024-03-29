<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $login
 * @property string $nickname
 * @property string $password
 */
class SignUpRequest extends FormRequest
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
            'login' => 'required|min:4|max:255|unique:users',
            'nickname' => 'required|min:2|max:255|unique:users',
            'password' => 'required|min:6|max:100|confirmed', //max здесь из-за ограничений базы данных на длину символов
            'avatar' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => __('Необходимо ввести логин'),
            'login.min' => __('Логин не может быть короче 4 символов'),
            'login.max' => __('Логин не может быть длиннее 255 символов'),
            'login.unique' => __('Данный логин уже занят'),
            'nickname.required' => __('Необходимо ввести ник'),
            'nickname.min' => __('Ник не может быть короче двух символов'),
            'nickname.max' => __('Ник не может быть длиннее 255 символов'),
            'nickname.unique' => __('Данный ник уже занят'),
            'password.required' => __('Необходимо ввести пароль'),
            'password.min' => __('Пароль не может быть короче 6 символов'),
            'password.max' => __('Пароль не может быть длиннее 100 символов'),
            'password.confirmed' => __('Пароли не совпадают'),
            'avatar.required' => __('Необходимо выбрать аватар'),
            'avatar.image' => __('Необходимо ввести фотографию')
        ];
    }
}
