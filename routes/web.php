<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event;
use App\Livewire\Counter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/', function () {
//     return view('welcome');
  $event =new Event;
  $event->name='Test from App';
  $event->startDateTime= Carbon\Carbon::now();
  $event->endDateTime= Carbon\Carbon::now()->addHour();
  $event->save();
 $e = Event::get();
 dd($e);
 });

 Route::get('/counter', Counter::class);

Route::resource('appointment',BookingController::class);


Route::get('/send-reminders', 'BookingController@sendAppointmentReminders');


Route::get('/', [HomeController::class, 'index']);

Route::get('/add_service', [AdminController::class, 'addService']);

Route::post('/upload_service', [AdminController::class, 'uploadService']);

//Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/showAppointment', [AdminController::class, 'showAppointment']);

Route::get('/view_service', [AdminController::class, 'view_service']);


Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);

Route::get('/edit_service/{id}', [AdminController::class, 'edit_service']);

Route::post('/editService/{id}', [AdminController::class, 'editService']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

Route::get('/delete_service/{id}', [AdminController::class, 'delete_service']);

//Route::resource('appointment',EventController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth','verified');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
