<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventApiResource extends JsonResource
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
            'start' => $this->start,
            'end' => $this->end,
            'description' => $this->description,
            'links' => [
                'web' => route('events.show', $this),
                'api' => route('api-events.show', $this),
            ],
            'group' => new GroupApiResource($this->whenLoaded('group')),
        ];
    }
}
