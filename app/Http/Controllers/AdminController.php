<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Notifications\FirstNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addService(){
        return view('admin.add_service');
    }

    public function uploadService(Request $request){
        $service = new service;
        $service->service_name=$request->service_name;
        $service->service_description=$request->service_description;
        $service->price=$request->price;

        $service->save();

        return redirect()->back()->with('message','Service added successfully');
    }

    public function showAppointment(){

        $data = Appointment::all();

        return view('admin.showAppointment', compact('data'));
    }

    public function approved($id){

        $data= Appointment::find($id);

        $data->status='approved';

        $data->save();

        return redirect()->back();
    }


    public function cancelled($id){

        $data= Appointment::find($id);

        $data->status='cancelled';

        $data->save();

        return redirect()->back();
    }

    public function view_service(){

        $data= Service::all();

          return view('admin.view_service',compact('data'));

    }


    public function edit_service($id){

        $data= Service::find($id);

     return view('admin.edit_service', compact('data'));

    }

    public function delete_service($id){

        $data=Service::find($id);

        $data->delete();

        $data->save();

        return redirect()->back()->with('message','Service deleted successfully');
    }

    public function editService( Request $request, $id){

          $service =Service::find($id);

          $service->service_name=$request->service_name;
          $service->service_description=$request->service_description;
          $service->price=$request->price;
          
          $service->save();

          return redirect()->back()->with('message','Service Details Updated Successfully');

    }


    public function emailview($id){

       $data= appointment::find($id);

        return view('admin.emailview',compact('data'));
    }

    public function sendemail(Request $request, $id){

        $data= Appointment::find($id);

        $details=[

        'greeting' => $request->greeting,

        'body' => $request->body,

        'actiontext' => $request->actiontext,

        'actionurl' => $request->actionurl,

        'endpart' => $request->endpart

        ];

        Notification::send($data, new FirstNotification($details));

        return redirect()->back()->with('message','Email sent successfully');
    }
}
