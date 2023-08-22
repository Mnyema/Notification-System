<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use Illuminate\Console\Command;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminder Email to all appointments';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     // $duration = $request->input('duration');
           //get all reminders for today
       $appointments = Appointment::query()
       ->where('start_date', now()->format('Y-m-d'))
       ->where('status', 'approved')
       ->orderBy('user_id')
       ->get();
  //dd($appointments);

           //group by user
        $data=[];
      foreach($appointments as $appointment){
     $data[$appointment->user_id][]= $appointment->toArray();
     //dd($data);
     
      } 

      foreach($data as $user_id=>$appointments){
        $this->sendEmailToUser($user_id, $appointments);
      }
    }
          //send emails
  private function sendEmailToUser($user_id, $appointments){
   $user=User::find($user_id);
   Mail::to($user)->send(new ReminderEmail($appointments));
}


//    $appointments= Appointment::query()
//    ->where('status','approved')
//    ->where('start_date', '>=' , now()->format('Y-m-d'))
//    ->orderBy('id')
//    ->get();
//    //dd($appointments);

//    foreach ($appointments as $appointment) 
//    //dd($appointment);
//    {
//     $halfDurationMinutes = $this->calculateHalfDurationInMinutes($appointment->start_date, $appointment->start_time, $appointment->duration);
//     $reminderTime = now()->addMinutes($halfDurationMinutes);

//     if ($reminderTime->isPast()) {
//       // Send the reminder email
//       $user = $appointment->user; // Assuming a relationship exists
//       Mail::to($user->email)->send(new ReminderEmail($appointments));
//   }
// }
//     }

//     private function calculateHalfDurationInMinutes($startDate, $startTime, $duration)
//     {
      
//         $appointmentDateTime = Carbon::parse("$startDate $startTime");
// //dd($appointmentDateTime);
//         switch ($duration) {
//             case 'Once':
//                 $halfDuration = $appointmentDateTime->subMinutes($appointmentDateTime->diffInMinutes(now()) / 2); 
//                 break;
//             case 'Weekly':
//                 $halfDuration = $appointmentDateTime->subWeek()->subMinutes($appointmentDateTime->diffInMinutes(now()) / 2);
//                 break;
//             case 'Monthly':
//                 $halfDuration = $appointmentDateTime->subMonth()->subMinutes($appointmentDateTime->diffInMinutes(now()) / 2);
//                 break;
//             case 'Yearly':
//                 $halfDuration = $appointmentDateTime->subYear()->subMinutes($appointmentDateTime->diffInMinutes(now()) / 2);
//                 break;
//             default:
//                 throw new \InvalidArgumentException("Invalid duration: $duration");
//         }

//         return $halfDuration->diffInMinutes(now());
//     }

    }

  