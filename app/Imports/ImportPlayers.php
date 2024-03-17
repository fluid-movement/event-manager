<?php

namespace App\Imports;

use App\DTO\PlayerDTO;
use App\Models\Player;

class ImportPlayers
{
    /**
     * @param array $data array of PlayerDTO objects
     * @return void
     */
    public function import(array $data): void
    {
        /** @var PlayerDTO $playerData */
        foreach ($data as $playerData) {
            $player = Player::firstOrNew(['id' => $playerData->id]);
            $player->fill([
                'id' => $playerData->id,
                'first_name' => $playerData->first_name,
                'last_name' => $playerData->last_name,
                'gender' => $playerData->gender,
                'country' => $playerData->country,
                'membership' => $playerData->membership,
                'last_active' => $playerData->last_active,
                'created_at' => $playerData->created_at,
            ]);
            $player->save();
        }
    }
}
