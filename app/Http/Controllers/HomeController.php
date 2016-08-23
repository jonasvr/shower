<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests;
use App\Reservatie;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Reservatie
     */
    protected $res;
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Device
     */
    protected $device;

    /**
     * HomeController constructor.
     * @param Reservatie $res
     * @param User $user
     * @param Device $device
     */
    public function __construct(Reservatie $res, User $user, Device $device)
    {
        $this->middleware('auth');
        $this->res = $res;
        $this->user = $user;
        $this->device = $device;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return $this
     */
    public function stats()
    {
        $data = $this->GetStats();

        return view('stats.stats')->with($data);
    }

    ////Helper///
    public function GetStats()
    {
        $all = $this->res->GetUses()->count();
        $all_girl =[
            'total' =>$this->res->GetUses()
                ->CountGirl(),
            'perc' => $this->res->GetUses()
                    ->CountGirl() / $all * 100,
        ];
        $all_boy =[
            'total' =>$this->res->GetUses()
                ->CountBoy(),
            'perc' => $this->res->GetUses()
                    ->CountBoy() / $all * 100,
        ];
        $kot = $this->res->GetUses()
            ->GetKot(Auth::user()->koten_id)
            ->count();
        $girl = $this->res->GetUses()
            ->GetKot(Auth::user()->koten_id)->where('users.sex',1)->get();
        $girl = $girl->count();
        $perc = 0;
        if ($girl)
        {
            $perc = $girl/$kot*100;
        }
        $kot_girl =[
            'total' =>$girl,
            'perc' => $perc,
        ];

        $boy = $this->res->GetUses()
            ->GetKot(Auth::user()->koten_id)->get();
        $boy = $boy->count();
        $perc = 0;
        if ($boy){
            $perc = $boy/$kot*100;
        }
        $kot_boy =[
            'total' => $boy,
            'perc' => $perc,
        ];

        $time_all = $this->device->sum('spend_time');
        $time_kot = $this->device->FindDevices(Auth::user()->koten_id)
            ->sum('spend_time');

        $data=[
            'all' => $all,
            'all_girl' => $all_girl,
            'all_boy' => $all_boy,
            'kot' => $kot,
            'kot_girl' => $kot_girl,
            'kot_boy' => $kot_boy,
            'time_all' => $time_all,
            'time_kot' => $time_kot,
        ];

        return $data;
    }


    public function send()
    {

    }
}
