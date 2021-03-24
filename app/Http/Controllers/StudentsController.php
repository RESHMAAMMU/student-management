<?php

namespace App\Http\Controllers;

use App\Students;
use App\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    protected $staudents ;

    public function __construct(Students $students)
    {
        $this->staudents = $students ;

    }

    public function get()
    {
        $teachers = Teachers::get();
        $user = $this->staudents->with('staff')
        ->get();
        return view('student.index',compact('user','teachers'));
    }
    public function store(Request $req)
    {
      $student = $this->staudents->create([
            'name'=>$req->user_name,
            'age'=>$req->age,
            'gender'=>$req->gender,
            'reporting_teacher'=>$req->staff
        ]);
        $msg="Student added successfully";
             if ($student) {
                 return response()->json(['status' => 1, 'message' => $msg]);
             } else {
                 return response()->json(['status' => 0, 'message' => 'Sorry something went wrong.']);
             }
    }
    public function edit($id)
    {
        $user = $this->staudents->where('id',$id)->first();
        return[
            'user'=>$user
        ]; 
    }
    public function destroy(Request $req)
    {
        $user = $this->staudents->find($req->id);
        $user->delete();
        return response()->json(['status' => 1, 'message' => 'Student deleted successfully']);

    }
    public function update(Request $req)
    {
        $this->staudents->where('id',$req->id)
        ->update([
            'name'=>$req->user_name,
            'age'=>$req->age,
            'gender'=>$req->gender,
            'reporting_teacher'=>$req->staff
        ]);

        $msg="Student details updated successfully";
        return response()->json(['status' => 1, 'message' => $msg]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success','Logout successfully.');
        return redirect()->route('login');
    }

}
