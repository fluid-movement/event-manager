<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::findForUser(auth()->user())->get()->sortBy('start');
        $group = auth()->user()->group;
        Inertia::render('Dashboard', compact('events', 'group'));
    }
}
