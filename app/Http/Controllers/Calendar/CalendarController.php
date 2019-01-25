<?php

namespace App\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use App\Http\Requests\CalendarEvent;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\CalendarEvents;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware('auth');
    }

    /**
     * Display user post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        return view('calendar.index', [
            'events' => CalendarEvents::getByUser(Auth::id())
        ]);
    }

    /**
     * Post form to add post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createEvent (CalendarEvent $request)
    {
        $data = $request->except(['_token']);
        $calendar = CalendarEvents::add($data);
        dd($calendar);
    }

}
