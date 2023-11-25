<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\Doctor;

class AdminController extends Controller
{
    public function add_doctor_view()
    {

        return view('admin.add_doctor');

    }

    public function upload_doctor(Request $request)
    {
        
        $doctor=new doctor;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully!');

    }

    public function admin_appointments()
    {
        $data=appointment::all();

        return view('admin.appointments', compact('data'));

    }

    public function approved($id)
    {
        $data=appointment::find($id);

        if($data->status=='Canceled')
        {

            return redirect()->back()->with('error', 'Canceled Appointments Can t Be Approved!');
            
        }
        else
        {

            $data->status='Approved';

            $data->save();

            return redirect()->back()->with('message', 'Appointment Approved Successfully!');

        }


    }

    public function canceled($id)
    {
        $data=appointment::find($id);

        if($data->status=='Approved')
        {
            return redirect()->back()->with('error', 'Appreoved Appointments Can t Be Canceled!');
        }
        else
        {
            $data->status='Canceled';

            $data->save();
    
            return redirect()->back()->with('message', 'Appointment Canceled Successfully!');
        }

        


    }

    public function show_doctor()
    {
        $data=doctor::all();

        return view('admin.show_doctor', compact('data'));    
    }

    public function delete_doctor($id)
    {
        $data=doctor::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Doctor Deleted Successfully!');
    }

    public function update_doctor($id)
    {
        $data=doctor::find($id);


        return view('admin.update_doctor', compact('data'));

    }

    public function edit_doctor(Request $request, $id)
    {

        $doctor=doctor::find($id);

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->file;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);

            $doctor->image=$imagename;

        }

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Updated Successfully!');

    }

}
