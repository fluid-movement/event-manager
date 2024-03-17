<?php

namespace App\DTO;

class EventDTO
{
    public function __construct(
        readonly string $id,
        readonly string $name,
        readonly string $start,
        readonly string $end,
        readonly string $created_at
    )
    {
    }
}
