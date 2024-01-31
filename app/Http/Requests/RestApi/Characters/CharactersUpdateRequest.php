<?php

namespace App\Http\Requests\RestApi\Characters;

use App\Http\Requests\RestApi\Abstracts\AbstractRestApiRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property $name
 * @property $description
 * @property $image
 */
class CharactersUpdateRequest extends AbstractRestApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'min:4|max:255',
            'description' => 'min:30',
            'image' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => __('Имя не может быть короче 4 символов'),
            'name.max' => __('Имя не может быть длиннее 255 символов'),
            'description.min' => __('Описание персонажа не может быть короче 30 символов'),
            'image.string' => __('Постер мультфильма должен быть изображением в base64 формате')
        ];
    }
}
