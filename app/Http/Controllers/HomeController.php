<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
//use Spatie\GoogleCalendar\Event;
//use Carbon\Carbon;

class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id()){

            if (Auth::user()->User_type=='0'){
                $service= Service::all();

                $userid=Auth::user()->id;

                $appointment = Appointment::where('user_id',$userid)->get();

                return view('user.home', compact('service','appointment'));
            }
            else {
                return view('admin.home');
            }
        }
        else 
        {
            return redirect()->back();
        }
    }




    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        }
        else
        $service= service::all();
        return view('user.home', compact('service'));
    }



    //public function appointment(Request $request){
    //    $data = new appointment;

    //        $data->name=$request->name;

    //        $data->service_name=$request->service_name;

    //        $data->start_date=$request->start_date;

    //        $data->start_time=$request->start_time;

    //        $data->duration=$request->duration;

    //        $data->status='In progress';


    //        if(Auth::id()){
    //        $data->user_id=Auth::user()->id;
    //        } 
    //   $data->save();

       // Create a new event on Google Calendar
    // $event = new Event;
    // $event->name = 'New Appointment';
    // $event->startDateTime = Carbon::parse($request->input('start_date') . ' ' . $request->input('start_time'));
    // $event->endDateTime = $event->startDateTime->copy()->addHour();
    // $event->save();


     // return redirect()->back()->with('message','Appointment Request successful. You will be notified soon. ');
   // }

    public function myappointment(){
        if (Auth::id()){

            $userid=Auth::user()->id;

            $appointment = Appointment::where('user_id',$userid)->get();

        return view('user.home', compact('appointment'));
        }
        else 
        {
            return redirect()->back();
        }
    }

public function cancel_appoint($id){

         $data=Appointment::find($id);
         $data->delete();
       return redirect()->back();
}

}
