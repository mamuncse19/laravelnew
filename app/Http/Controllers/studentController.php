<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class studentController extends Controller
{
    public function student()
    {
    	return view('student.create');
    }

    public function studentInsert(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:25',
        'email' => 'required|unique:students',
        'phone' => 'required|unique:students|max:11',
    ]);

    	$student = new Student;

    	$student->name = $request->name;
    	$student->email = $request->email;
    	$student->phone = $request->phone;

    	$execute = $student->save();
    	if($execute){
    	$sms = array(
    			'message' => 'Successfully Student inserted',
    			'alert-type' => 'success'
    		);
    	}
    	return Redirect('/all.student')->with($sms);
    }

    public function viewStudent()
    {
    	
    	$getstd = Student::all();
    	return view('student.allStudent',compact('getstd'));
    	

    }
}
