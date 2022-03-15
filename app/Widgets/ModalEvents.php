<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Event;
use Carbon\Carbon;

class ModalEvents extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $events = Event::where('end_date','>',date("Y-m-d"))->get();


        return view('widgets.modal_events', [
            'config' => $this->config,
            'events' => $events
        ]);
    }
}
