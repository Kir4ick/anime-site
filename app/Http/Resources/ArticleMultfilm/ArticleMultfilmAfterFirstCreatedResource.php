<?php

namespace App\Http\Resources\ArticleMultfilm;

use App\Models\ArticleMultfilm;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleMultfilmAfterFirstCreatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ArticleMultfilm $request */

        return [
            'id' => $request->id,
            'title' => $request->title,
            'poster' => url($request->poster)
        ];
    }
}
