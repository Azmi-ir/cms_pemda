<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        // return Carbon::now()->toDateTimeString();
        $event = Event::where('start_date', '>=', Carbon::now()->toDateTimeString())->where('end_date', '<=', Carbon::now()->addMonths(1)->toDateTimeString())->get();

        return $event;
    }
}
