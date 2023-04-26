<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCalendar extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_events = Event::all();
        $events = [];
        foreach ($all_events as $event) {
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }


        return view('calendar', compact('events'));
    }
}
