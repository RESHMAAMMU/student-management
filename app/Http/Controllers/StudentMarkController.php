<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    protected $mark ;

    public function __construct(Mark $mark)
    {
        $this->mark =$mark;
    }

    public function get()
    {
        $user = $this->mark->with('student')->get();
        $student = Students::get();
        return view('student.mark',compact('user','student'));
    }
    public function store(Request $req)
    {
        $total  = $req->maths + $req->science + $req->history;
      $student = $this->mark->create([
            'student_id'=>$req->student,
            'maths'=>$req->maths,
            'science'=>$req->science,
            'history'=>$req->history,
            'term'=>$req->term,
            'total'=>$total,
            'created_at'=>Carbon::now()
        ]);
        $msg="Student mark added successfully";
             if ($student) {
                 return response()->json(['status' => 1, 'message' => $msg]);
             } else {
                 return response()->json(['status' => 0, 'message' => 'Sorry something went wrong.']);
             }
    }
    public function edit($id)
    {
        $user = $this->mark->where('id',$id)->first();
        return[
            'user'=>$user
        ]; 
    }
    public function destroy(Request $req)
    {
        $user = $this->mark->find($req->id);
        $user->delete();
        return response()->json(['status' => 1, 'message' => 'Student mark deleted successfully']);

    }
    public function update(Request $req)
    {
      
        $total  = $req->maths + $req->science + $req->history;
        Mark::where('id',$req->user_unique)
        ->update([
            'student_id'=>$req->student,
            'maths'=>$req->maths,
            'science'=>$req->science,
            'history'=>$req->history,
            'term'=>$req->term,
            'total'=>$total,
           
        ]);

        $msg="Student mark updated successfully";
        return response()->json(['status' => 1, 'message' => $msg]);
    }
}
