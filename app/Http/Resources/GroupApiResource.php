<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupApiResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'links' => [
                'web' => route('groups.show', $this),
                'api' => route('api-groups.show', $this),
            ],
            'events' => EventApiResource::collection($this->whenLoaded('events')),
        ];
    }
}
