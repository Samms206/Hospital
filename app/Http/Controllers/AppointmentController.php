<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appointment = Appointment::findOrFail($userid)->get();
            return view('user.my_appointment', ['appointment' => $appointment]);
        }else{
            return redirect()->back();
        }
    }
    public function store(Request $request){
        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->phone = $request->phone;
        $data->doctor = $request->doctor;
        $data->status = 'In Progress';
        if(Auth::id()){
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment Booked Successfully, We will contact with you soon');
    }
    public function cancel(Request $request,$id){
        $data = Appointment::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Appointment Cancelled Successfully');
    }
}
