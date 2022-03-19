<?php

namespace App\Http\Resources\API\Shared\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'images' => $this->images,
        ];
    }
}
