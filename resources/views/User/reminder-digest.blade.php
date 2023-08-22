<x-mail::message>
# Appointment Reminder

 @foreach ($appointments as $appointment)

Hi {{$appointment['name']}}

You have an appointment scheduled for:<br>
Service:  {{$appointment['service_name']}}<br>
Date:  {{$appointment['start_date']}}<br>
Time:  {{$appointment['start_time']}}


@endforeach 

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
