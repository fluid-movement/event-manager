<?php

namespace App\Imports;

use App\DTO\EventDTO;
use App\Models\Event;

class ImportEvents
{
    /**
     * @param array $data array of PlayerDTO objects
     * @return void
     */
    public function import(array $data): void
    {
        /** @var EventDTO $eventData */
        foreach ($data as $eventData) {
            if (Event::where('id', $eventData->id)->exists()) {
                continue;
            }
            $name = preg_replace('/^(?!1234)\d{4}\b/', '', $eventData->name) ?? '';
            $event = new Event();
            $event->id = $eventData->id;
            $event->fill([
                'name' => trim($name, ' \n\r\t\v\0-'),
                'start' => $eventData->start,
                'end' => $eventData->end,
                'created_at' => $eventData->created_at,
            ])->save();
        }
    }
}
