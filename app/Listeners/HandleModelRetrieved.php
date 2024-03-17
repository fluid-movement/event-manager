<?php

namespace App\Listeners;

use App\Events\ModelRetrieved;

class HandleModelRetrieved
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ModelRetrieved $event): void
    {
        $model = $event->model;
        if ($model instanceof \App\Models\Event) {
            $model->link = route('events.show', $model);
        } elseif ($model instanceof \App\Models\Group) {
            $model->link = route('groups.show', $model);
        }
    }
}
