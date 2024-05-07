<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            // Define how your resource should be transformed
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'views' => $this->views,
            // Add more attributes as needed
        ];
    }
}