<?php

namespace App\Http\Resources;

use App\Models\Event;
use App\Models\User;
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
            'start' => $this->start->timestamp,
            'end' => $this->end->timestamp,
            'start_readable' => $this->start->format('Y-m-d'),
            'end_readable' => $this->end->format('Y-m-d'),
            'description' => $this->description,
            'interested' => $this->belongsToMany(User::class)->wherePivot('status', Event::$interested)->count(),
            'attending' => $this->belongsToMany(User::class)->wherePivot('status', Event::$attending)->count(),
            'links' => [
                'web' => route('events.show', $this),
                'api' => route('api-events.show', $this),
            ],
            'group' => new GroupApiResource($this->whenLoaded('group')),
        ];
    }
}
