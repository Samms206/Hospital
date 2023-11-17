<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function store(Request $request){
        $doctor = new Doctor();
        $image = $request->file;
        $imagename = time().".".$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);

        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }
}
