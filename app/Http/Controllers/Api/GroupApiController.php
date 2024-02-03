<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\EventApiResource;
use App\Http\Resources\GroupApiResource;
use App\Models\Event;
use App\Models\Group;

class GroupApiController extends Controller
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
        return GroupApiResource::collection(Group::with('events')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return new GroupApiResource($group->load('events'));
    }
}
