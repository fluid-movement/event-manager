<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\EventApiResource;
use App\Models\Event;

class EventApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:60,1')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EventApiResource::collection(Event::with('group')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return new EventApiResource($event->load('group'));
    }
}
