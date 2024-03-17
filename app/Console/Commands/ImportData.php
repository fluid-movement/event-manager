<?php

namespace App\Console\Commands;

use App\DTO\EventDTO;
use App\DTO\PlayerDTO;
use App\DTO\ResultDTO;
use App\DTO\TeamDTO;
use App\Imports\ImportEvents;
use App\Imports\ImportPlayers;
use App\Imports\ImportResults;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Support\Facades\Http;

class ImportData extends Command implements Isolatable
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from external resource';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // download resource
        //$this->download();
        $data = json_decode(file_get_contents(storage_path(config('import.storage_path'))), true);

        // import data
        (new ImportPlayers())->import($this->preparePlayerData($data));
        (new ImportEvents())->import($this->prepareEventData($data));
        (new ImportResults())->import($this->prepareResultData($data));
    }

    public function download(): void
    {
        $response = Http::withOptions(['verify' => false])->acceptJson()->get(config('import.url'));
        $data = $response->json()['data'];
        file_put_contents(storage_path(config('import.storage_path')), json_encode($data)); // todo verify and handle errors
    }

    protected function preparePlayerData(array $data): array
    {
        $playerObjects = [];
        if ($data && is_array($data['playersData'])) {
            foreach ($data['playersData'] as $playerData) {
                $playerObjects[] = new PlayerDTO(
                    $playerData['key'],
                    $playerData['firstName'] ?? '',
                    $playerData['lastName'] ?? '',
                    $playerData['gender'] ?? '',
                    $playerData['country'] ?? '',
                    $playerData['membership'] ?? 0,
                    $playerData['lastActive'] ?? '',
                    $playerData['createdAt'] ?? '',
                );
            }
        }
        return $playerObjects;
    }

    protected function prepareEventData(array $data): array
    {
        $eventObjects = [];
        if ($data && is_array($data['eventsData'])) {
            foreach ($data['eventsData'] as $eventData) {
                $eventObjects[] = new EventDTO(
                    $eventData['key'],
                    $eventData['eventName'],
                    $eventData['startDate'],
                    $eventData['endDate'],
                    $eventData['createdAt'],
                );
            }
        }
        return $eventObjects;
    }

    protected function prepareResultData(array $data): array
    {
        $resultObjects = [];
        if ($data && is_array($data['resultsData'])) {
            foreach ($data['resultsData'] as $result) {
                foreach ($result['resultsData'] as $round => $rounds) {
                    if (!str_starts_with($round, 'round')) {
                        continue; // skip non-result data
                    }
                    foreach ($rounds as $pool => $pools) {
                        if (!str_starts_with($pool, 'pool')) {
                            continue; // skip non-result data
                        }
                        $teams = [];

                        foreach ($pools['teamData'] as $team) {
                            $teams[] = new TeamDTO(
                                $result['key'],
                                $team['players'],
                                $team['place'],
                                $team['points'],
                            );
                        }
                        $resultObjects[] = new ResultDTO(
                            $result['key'],
                            $result['eventId'],
                            $result['divisionName'],
                            $rounds['id'],
                            $pools['poolId'],
                            $teams,
                        );

                    }
                }
            }
        }
        return $resultObjects;
    }
}
