<?php

namespace App\DTO;

class TeamDTO
{
    public function __construct(
        public string $resultId,
        public array  $playerIds,
        public int    $place,
        public ?int    $points = 0
    )
    {
    }
}
