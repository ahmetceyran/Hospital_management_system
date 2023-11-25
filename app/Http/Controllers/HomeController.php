<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    
    public function redirect()
    {
        if(Auth::id())
        {

            if(Auth::user()->usertype=='1')
            {

                return view('admin.home');

            }

            else
            {
                $doctor = doctor::all();

                return view('user.home', compact('doctor'));

            }

        }

        else
        {

            return redirect()->back();

        }

    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }

        else
        {
            $doctor = doctor::all();

            return view('user.home', compact('doctor'));
        }

    }

    public function appointment(Request $request)
    {

        $appointment = new appointment;

        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->date=$request->date;
        $appointment->phone=$request->phone;
        $appointment->message=$request->message;
        $appointment->doctor=$request->doctor;
        $appointment->status='In progress';

        if(Auth::id())
        {

            $appointment->user_id=Auth::user()->id;

        }

        $appointment->save();

        return redirect()->back()->with('message', 'Appointment Requested Successfully. We Will Contact With You Soon!');

    }

    public function myappointment()
    {
        if(Auth::id())
        {

            $userid=Auth::user()->id;

            $appoint=appointment::where('user_id',$userid)->get();

            return view('user.my_appointment', compact('appoint'));
        }

        else
        {
            return redirect()->back();
        }
        
    }

    public function cancel_appoint($id)
    {

        $data=appointment::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Appointment Deleted Successfully!');

    }

}
