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

    public function allStudent()
    {
    	
    	$getstd = Student::all();
    	return view('student.allStudent',compact('getstd'));
    	

    }

    public function viewStudent($id)
    {
        $data = Student::findOrFail($id);

        return view('student.viewStudent',compact('data'));
    }

    public function delStudent($id)
    {
        $std = Student::find($id);
        $std->delete();

        $sms = array(
                'message' => 'Successfully Deleted',
                'alert-type' => 'success'
            );
        
        return Redirect()->back()->with($sms);
    }

    public function editStudent($id)
    {
        $std = Student::findOrFail($id);
        return view('student.editStudent',compact('std'));
    }

    public function updateStudent(Request $request,$id)
    {
        $std = Student::findOrFail($id);

        $std->name = $request->name;
        $std->email = $request->email;
        $std->phone = $request->phone;

        $std->save();

        $sms = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
        
        return Redirect('all.student')->with($sms);
    }
}
