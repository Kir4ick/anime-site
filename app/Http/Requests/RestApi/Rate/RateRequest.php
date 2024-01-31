<?php

namespace App\Http\Requests\RestApi\Rate;

use App\Http\Requests\RestApi\Abstracts\AbstractRestApiRequest;
use Illuminate\Support\Facades\Auth;

class RateRequest extends AbstractRestApiRequest
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
            'rate' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'rate.required' => __('Поле "rate" должно быть заполнено'),
        ];
    }
}
