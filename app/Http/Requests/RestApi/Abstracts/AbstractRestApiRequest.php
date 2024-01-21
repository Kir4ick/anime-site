<?php

namespace App\Http\Requests\RestApi\Abstracts;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class AbstractRestApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    protected function failedAuthorization()
    {
        throw new \HttpResponseException(
            response()->json(['message' => __('Не авторизован!')], Response::HTTP_UNAUTHORIZED)
        );
    }
}
