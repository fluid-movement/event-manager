<?php

namespace App\Http\Controllers;

use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::findForUser(auth()->user())->get()->sortBy('start');
        $group = auth()->user()->group;
        return view('dashboard', compact('events', 'group'));
    }
}
