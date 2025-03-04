<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('admin.main.index'));
    }

    public function welcome(Request $request){
        $data['upcomingEvent'] = Event::where('event_date','>=',today()->format('Y-m-d'))->where('start_at','>',now()->format('H'))->first();
        if($data['upcomingEvent'] !== null && $data['upcomingEvent']->start_at <= 12){
            $data['start_at'] = $data['upcomingEvent']->start_at . ' am';
        }elseif($data['upcomingEvent'] !== null && $data['upcomingEvent']->start_at > 12){
            $data['start_at'] = ($data['upcomingEvent']->start_at - 12) . ' pm';
        }
        if(config('services.esewa.url') !== null){
            $data['esewa_exist'] = true;
        }else{
            $data['esewa_exist'] = false;
        }
        return view('index', $data);
    }

    public function signup(){
        return redirect('/register');
    }
}
