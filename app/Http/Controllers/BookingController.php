<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\ReminderEmail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = new appointment;

        $data->name=$request->name;

        $data->service_name=$request->service_name;

         $data->start_date=$request->start_date;

         $data->start_time=$request->start_time;

        $data->duration=$request->duration;

        $data->status='In progress';


        if(Auth::id()){
        $data->user_id=Auth::user()->id;
        } 
       
   $data->save();

        $startTime= Carbon ::parse($request->input('start_date'). ' ' .$request->input('start_time'));
        $endTime=(clone $startTime)->addHour();

     Event::create([
     'name'=>$request->input('name'),
     'startDateTime'=>$startTime,
     'endDateTime'=>$endTime
     ]);

     return redirect()->back()->with('message','Appointment Requested successfully. You will be notified soon. ');

    }


    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
