<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function show_doctor(){
        $doctors = Doctor::all();
        return view('admin.show_doctor', ['doctors' => $doctors]);
    }
    public function show_appointments(){
        $appointment = Appointment::all();
        return view('admin.appointments', ['appointment' => $appointment]);
    }
    public function approved_appointment($id){
        $data = Appointment::findOrFail($id);
        $data->status = 'Approved';
        $data->save();
        //email notification
        $details = [
            'greeting' => 'Your Appointment has been approved',
            'body' => 'You have successfully approved this appointment',
            'actiontext' => 'View My Appointments',
            'actionurl' => url('/myappointment'),
            'endpart' => 'Thank you',
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }
    public function canceled_appointment($id){
        $data = Appointment::findOrFail($id);
        $data->status = 'Canceled';
        $data->save();
        //email notification
        $details = [
            'greeting' => 'Your Appointment has been cancelled',
            'body' => 'Sorry your appointment has been cancelled',
            'actiontext' => 'View My Appointments',
            'actionurl' => url('/myappointment'),
            'endpart' => 'Im Sorry, Thank you',
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }
}
