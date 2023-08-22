<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['name', 'service_name', 'start_date', 'start_time', 'duration', 'status', 'user_id'];


    /**
     * Get the email address where notification should be sent.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        // Assuming the 'user' relationship is defined and it returns the associated User model instance.
        return $this->user->email;
}
}