<?php

namespace App\DTO;

class PlayerDTO
{
    public function __construct(
        readonly string $id,
        readonly string $first_name,
        readonly string $last_name,
        readonly string $gender,
        readonly string $country,
        readonly string $membership,
        readonly string $last_active,
        readonly string $created_at
    )
    {
    }
}
