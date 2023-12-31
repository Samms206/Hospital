<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::get('/show_doctor', [AdminController::class, 'show_doctor']);
Route::post('/upload_doctor', [DoctorController::class, 'store']);
Route::get('/editdoctor/{id}', [DoctorController::class, 'edit']);
Route::post('/update_doctor/{id}', [DoctorController::class, 'update']);
Route::get('/deletedoctor/{id}', [DoctorController::class, 'delete']);
Route::get('/show_appointments', [AdminController::class, 'show_appointments']);
Route::get('/approved_appoint/{id}', [AdminController::class, 'approved_appointment']);
Route::get('/canceled_appoint/{id}', [AdminController::class, 'canceled_appointment']);


Route::post('/appointment', [AppointmentController::class, 'store']);
Route::get('/myappointment', [AppointmentController::class, 'index']);
Route::get('/cancel_appoint/{id}', [AppointmentController::class, 'cancel']);




