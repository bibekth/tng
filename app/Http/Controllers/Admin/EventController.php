<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $event = Event::findOrFail($request->event_id);
            return response()->json($event, 200);
        }
        $data['events'] = Event::all();
        return view('admin.event', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'title' => "required",
            'banner' => "required",
            'logo' => 'required',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'time' => 'required|numeric|min:0|max:23',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput($request->input());
        }
        try {
            DB::beginTransaction();
            $auth = Auth::user();
            $banner_image = File::get($request->banner);
            $logo_image = File::get($request->logo);
            $banner_path = "/images/events/" . time() . $request->file('banner')->getClientOriginalName();
            $logo_path = "/images/events/" . time() . $request->file('logo')->getClientOriginalName();
            Storage::disk('public')->put($banner_path, $banner_image);
            Storage::disk('public')->put($logo_path, $logo_image);
            Event::create([
                'name' => $request->name,
                'title' => $request->title,
                'banner_image' => $banner_path,
                'logo_image' => $logo_path,
                'description' => $request->description,
                'created_by' => $auth->id,
                'event_date' => $request->event_date,
                'start_at' => $request->time,
            ]);
            DB::commit();
            Session::flash('success',$request->name.' event has been created successfully.');
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', $e->getMessage());
            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'title'=>'required',
            'banner'=>'nullable',
            'logo'=>'nullable',
            'description'=>'nullable',
            'event_date' => 'required|date',
            'time' => 'required|numeric|min:0|max:23',
        ]);
        if($validator->fails()){
            Session::flash('error',$validator->errors());
            return back();
        }
        try{
            DB::beginTransaction();
            // $auth = Auth::user();
            $banner_path = $event->banner_image;
            $logo_path = $event->logo_image;
            $description = $event->description;
            if($request->description){
                $description=$request->description;
            }
            if($request->file('logo')){
                $logo_image = File::get($request->logo);
                $logo_path = "/images/events/" . time() . $request->file('logo')->getClientOriginalName();
                Storage::disk('public')->put($logo_path, $logo_image);
            }
            if($request->file('banner')){
                $banner_image = File::get($request->banner);
                $banner_path = "/images/events/" . time() . $request->file('banner')->getClientOriginalName();
                Storage::disk('public')->put($banner_path, $banner_image);
            }
            $event->update([
                'name' => $request->name,
                'title' => $request->title,
                'banner_image' => $banner_path,
                'logo_image' => $logo_path,
                'description' => $description,
                'event_date' => $request->event_date,
                'start_at' => $request->time,
            ]);
            DB::commit();
            Session::flash('success',$request->name.' event has been updated successfully');
            return back();
        }catch(Exception $e){
            DB::rollBack();
            Session::flash('error',$e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json('success',200);
    }
}
