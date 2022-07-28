<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function List(Request $request){
        if (Auth::user()->can_do('attendance.manage')) {
            if ($request->isMethod('post')) {
                $guide = $this->store($request);
            }
            return view('attendance.list');
        }
    }

    public function store(Request $request){
        if (Auth::user()->can_do('attendance.manage')){
            if($request->isMethod('POST')){
                if($request->is_attendant){
                    Attendance::where('date', $request->date)->delete();
                    foreach ($request->is_attendant as $key => $val){
                        $att                = new Attendance();
                        $att->student_ID    = $key;
                        $att->is_attendant  = $val;
                        $att->date          = $request->date;
                        $att->save();
                    }
                }
                return true;
            }
        }
    }

}
