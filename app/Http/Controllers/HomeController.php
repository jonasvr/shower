<?php

namespace App\Http\Controllers;

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
     * HomeController constructor.
     * @param Reservatie $res
     * @param User $user
     */
    public function __construct(Reservatie $res, User $user)
    {
        $this->middleware('auth');
        $this->res = $res;
        $this->user = $user;
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
        $kot_girl =[
            'total' =>$this->res->GetUses()
                ->GetKot(Auth::user()->koten_id)
                ->CountGirl(),
            'perc' => $this->res->GetUses()
                    ->GetKot(Auth::user()->koten_id)
                    ->CountGirl() / $kot * 100,
        ];
        $kot_boy =[
            'total' =>$this->res->GetUses()
                ->GetKot(Auth::user()->koten_id)
                ->CountBoy(),
            'perc' => $this->res->GetUses()
                    ->GetKot(Auth::user()->koten_id)
                    ->CountBoy() / $kot * 100,
        ];

        $data=[
            'all' => $all,
            'all_girl' => $all_girl,
            'all_boy' => $all_boy,
            'kot' => $kot,
            'kot_girl' => $kot_girl,
            'kot_boy' => $kot_boy,
        ];

        return $data;
    }
}
