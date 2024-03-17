<?php

namespace App\DTO;

class ResultDTO
{
    public function __construct(
        public string $result_id,
        public string $event_id,
        public string $division,
        public int    $round,
        public string $pool,
        public array  $teams
    )
    {

    }
}
