<?php

namespace App\Http\Requests\RestApi;

use App\Http\Requests\RestApi\Abstracts\AbstractRestApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class FisrtCreateArticleMultfilmRequest extends AbstractRestApiRequest
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
            'title' => 'required|min:4|max:255',
            'premier' => 'required|date',
            'poster' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Введите пожалуйста название'),
            'title.min' => __('Название не может быть короче 4 символов'),
            'title.max' => __('Название не может быть длиннее 255 символов'),
            'premier.required' => __('Пожалуйста введите дату показа'),
            'premier.date' => __('Дата показа должна быть датой'),
            'poster.required' => __('Загрузите пожалуйста постер мультфильма'),
            'poster.string' => __('Постер мультфильма должен быть изображением в base64 формате')
        ];
    }
}
