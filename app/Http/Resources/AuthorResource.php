<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->getTranslations('first_name'),
            'last_name' => $this->getTranslations('last_name'),
            'photo' => $this->photo,
            'books' => $this->when($request->withBooks, BookResource::collection($this->books)),
        ];
    }
}
