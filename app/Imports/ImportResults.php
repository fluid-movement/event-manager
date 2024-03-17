<?php

namespace App\Imports;

use App\DTO\ResultDTO;
use App\Models\Result;

class ImportResults
{
    /**
     * @param array $data array of ResultDTO objects
     * @return void
     */
    public function import(array $data): void
    {
        /** @var ResultDTO $resultData */
        foreach ($data as $resultData) {
            $result = Result::firstOrNew(
                [
                    'key' => $resultData->result_id,
                    'event_id' => $resultData->event_id,
                    'division' => $resultData->division,
                    'round' => $resultData->round,
                    'pool' => $resultData->pool,
                ]
            );
            $result->save();

            foreach ($resultData->teams as $teamData) {
                $team = $result->teams()->firstOrNew(
                    [
                        'result_id' => $result->id,
                        'place' => $teamData->place,
                    ]
                );
                $team->fill([
                    'points' => $teamData->points ?? 0,
                ]);
                $team->save();

                if (is_array($teamData->playerIds)) {
                    $team->players()->sync($teamData->playerIds);
                } else {
                    // logging
                    $team->players()->detach();
                }
            }
        }
    }
}
