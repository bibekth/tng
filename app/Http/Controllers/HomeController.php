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
        // return view('home');
    }

    public function welcome(Request $request){
        $data['upcomingEvent'] = Event::where('event_date','>',today())->first();
        return view('index', $data);
    }

    public function signup(){
        return redirect('/register');
    }
}
