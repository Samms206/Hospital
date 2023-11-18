<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back();
    }
    public function canceled_appointment($id){
        $data = Appointment::findOrFail($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }
}
