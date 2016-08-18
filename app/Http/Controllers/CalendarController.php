<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Reservatie;
use App\Device;
use App\User;
use Auth;

use App\Http\Requests\ReserveRequest;

class CalendarController extends Controller
{
    /**
     * @var Reservatie
     */
    protected $res;

    /**
     * @var Device|\App\Http\Controllers\Device
     */
    protected $device;

    /**
     * @var User
     */
    protected $user;

    /**
     * CalendarController constructor.
     * @param Reservatie $res
     * @param Device $device
     * @param User $user
     */
    public function __construct(Reservatie $res, Device $device, User $user)
    {
        $this->res = $res;
        $this->device = $device;
        $this->user = $user;
    }

    public function Calendar($id)
    {
        $res = $this->res->where('device_id',$id)->get();
        $device = $this->device->DevicesById($id)->first();
        $device = $this->checkReserve($device);
        $events = [];

        foreach ($res as $key =>$item){
            $events[] = $this->createEvent($item);
        }
        $calendar = $this->CalendarOptions($events);


        $data = [
            'calendar' => $calendar,
            'device' => $device,
            'today' => Carbon::now()->format('Y-m-d'),
        ];
        return view('calendar.calendar')->with($data);
    }


    public function reserve(ReserveRequest $request)
    {
//        dd($request->all());
        $start = new Carbon($request->date . $request->time);
        $end = $start->copy()->subMinutes(10);
        $taken = $this->res->where('start',$start)
            ->where('start','>=',$end)
            ->where('device_id',$request->device_id)
            ->first();

        if(!$taken) {
            $data['user_id'] = Auth::id();
            $data['start'] = $start;
            $data['device_id'] = $request->device_id;
            $this->res->create($data);
        }else{
         echo 'error';
        }
        return back();
    }

    ////////////////Helpers//////////////////

    public function createEvent($item)
    {
        $user = $this->user->where('id',$item->user_id)
            ->first();
//        dd($user->name);
        $name = $user->name;
        $end = new Carbon($item->start);
        return \Calendar::event(
            $name, //event title
            false, //full day event?
            $item->start, //start time (you can also use Carbon instead of DateTime)
            $end->addMinutes(10), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );
    }

    /**
     * @param $events
     * @return mixed
     */
    public function CalendarOptions($events)
    {
       return \Calendar::addEvents($events) //add an array with addEvents
//        ->addEvent($eloquentEvent, [ //set custom color fo this event
//            'color' => '#800',
//        ])
        ->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            'defaultView' => 'month',
            'header' => [
                'left' => 'prev,next today myCustomButton',
                'center' => 'title',
                'right' => 'month,basicDay'
            ],
            'timeFormat' => 'H:mm',
           'eventColor' => '#378006'
        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
//            'viewRender' => 'function() {alert("Callbacks!");}'
        ]);
    }

    public function checkReserve($devices)
    {
        $now = Carbon::now();
        $end = $now->copy()->subMinutes(10);
        $devices['res'] = 1;
            $res = $this->res->where('device_id',$devices->id)->get();
            foreach ($res as $key => $item) {
                if ($item->start < $now && $item->start > $end) {
                    $devices['res'] = 0;
                }
            }

        return $devices;
    }
}
