<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Cache\NullStore;
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

    public function welcome(Request $request)
    {
        $data['upcomingEvent'] = Event::where('event_date', '>=', today()->format('Y-m-d'))->first();
        if ($data['upcomingEvent'] !== null && $data['upcomingEvent']->event_date == today()->format('Y-m-d') && $data['upcomingEvent']->start_at <= now()->format('H')) {
            $data['upcomingEvent'] = null;
        }
        if ($data['upcomingEvent'] !== null && $data['upcomingEvent']->start_at <= 12) {
            $data['start_at'] = $data['upcomingEvent']->start_at . ' am';
        } elseif ($data['upcomingEvent'] !== null && $data['upcomingEvent']->start_at > 12) {
            $data['start_at'] = ($data['upcomingEvent']->start_at - 12) . ' pm';
        }
        if (config('services.esewa.url') !== null) {
            $data['esewa_exist'] = true;
        } else {
            $data['esewa_exist'] = false;
        }
        do {
            $time = random_int(0000, 999999);
        } while (Participant::where('payment_id', $time)->exists());
        $data['payment_id'] = $time;
        return view('index', $data);
    }

    public function signup()
    {
        return redirect('/register');
    }
}
