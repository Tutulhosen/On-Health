<?php

namespace App\Http\Controllers\frontend;

use App\Models\Doctor;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class FrontendController extends Controller
{
    /**
     * show home page
     */
    public function index()
    {
        $note= 'If you missed the CSS , you just click on the logo (One-Health). The image path is working properly in my localhost but not working in free live host at Heroku. I would be fixed it';
        $doctor_data= Doctor::latest()->get();
        return view('frontend.home', compact('doctor_data','note'));
    }


   

    /**
     * show login page
     */
    public function login()
    {
        $note= 'You can assecc the admin dashboard with Email:super@admin.com and password:123456789';
       
        return view('frontend.login', compact('note'));
    }


    /**
     * create an appoinment wwithout registration
     */
    public function appoinmentCreate(Request $request)
    {
        $this->validate($request, [
            'name'              =>'required',
            'email'             =>'required',
            'cell'              =>'required',
            'doctor'            =>'required',
            'date'              =>'required',
        ]);
        if (Auth::guard('patient')->check()==false) {
            Appoinment::create([
                'name'                  =>$request->name,
                'email'                 =>$request->email,
                'cell'                  =>$request->cell,
                'doctor'                =>$request->doctor,
                'date'                  =>$request->date,
                'message'               =>$request->message, 
                'status'                =>'In Progress' ,         
            ]);
        }
        
        if (Auth::guard('patient')->check()) {
            Appoinment::create([
                'name'                  =>$request->name,
                'email'                 =>$request->email,
                'cell'                  =>$request->cell,
                'doctor'                =>$request->doctor,
                'date'                  =>$request->date,
                'message'               =>$request->message, 
                'status'                =>'In Progress',
                'user_id'               =>Auth::guard('patient')->user()->id,          
            ]);
        }
        return back()->with('success', 'Successfully submit your appoinment');
    }


    /**
     * show the documentation page
     */
    public function document()
    {
        return view('frontend.documentation');
    }






}
