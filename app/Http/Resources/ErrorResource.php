<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'error_message' => $request->error_message,
            'code' => $request->code
        ];
    }
}
