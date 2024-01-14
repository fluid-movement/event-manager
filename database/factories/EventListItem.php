<?php

namespace App\View\Components;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventListItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Event $event, public string $dateFormat = 'jS')
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-list-item');
    }
}
