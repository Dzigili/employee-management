<?php

namespace App\Http\Controllers;

use App\Shift;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Calendar;
use Brian2694\Toastr\Facades\Toastr;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Calendar::all();
        $event = [];

        foreach ($events as $row) {
//            $enddate = $row->end_date."24:00:00";
            $event[] = \Calendar::event(
                $row->title . ' ' . $row->shift,
                false,
                new DateTime($row->start_date),
                new DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        $calendar = \Calendar::addEvents($event);
        $users = User::all();
        $shifts = Shift::all();
        return view('admin.calendar.event', compact('events', 'calendar', 'users', 'shifts'));
    }

    public function add()
    {
        $users = User::all();
        $shifts = Shift::all();
        return view('admin.calendar.addevent', compact('users', 'shifts'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
//            'start_date' => 'required',
//            'end_date' => 'required'
            ]
        );

        $shift = Shift::find($request->shift);
        $events = new Calendar();
        $events->title = $request->title;
        $events->color = $request->color;
        $events->start_date = $request->start_date . ' ' . $shift->start;
        $events->end_date = $request->start_date . ' ' . $shift->end;
        $events->shift = $request->shift;
        $events->save();
        Toastr::success('Event successfully added!', 'Success');
        return redirect('calendar');
    }
}
