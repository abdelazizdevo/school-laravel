<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Searchable\Search;

class StudentController extends Controller
{
    public function List(Request $request){
        if (Auth::user()->can_do('students.manage')) {
            if ($request->isMethod('post')) {
                $guide = $this->store($request);
            }
            $students = Student::all();
            if(isset($_GET['search'])){
                $students = (new Search())->registerModel(Student::class, ['name', 'gender', 'email', 'phone', 'father_name', 'father_phone', 'address', 'section_ID', 'group_name'])->search($_GET['search'])->map(function($i) {
                    return $i->searchable;
                });

            }
            return view('students.list',[
                'students' => $students
            ]);
        }
    }
    public function Report($ID){
        if (Auth::user()->can_do('students.manage')) {
            return view('students.report', [
                'student' => Student::find($ID)
                ]);
        }
    }

    public function store(Request $request){
        if (Auth::user()->can_do('students.manage')){
            if($request->isMethod('POST')){
                if(isset($request->student['ID'])){
                    $student         = Student::find($request->student['ID']);
                }else{
                    $student         = New Student();
                }
                $student->name              = $request->student['name'];
                $student->group_name        = $request->student['group_name'];
                $student->center_name       = $request->student['center_name'];
                $student->school_name       = $request->student['school_name'];
                $student->phone             = $request->student['phone'];
                $student->gender            = $request->student['gender'];
                $student->father_name       = $request->student['father_name'];
                $student->father_phone      = $request->student['father_phone'];
                $student->address           = $request->student['address'];
                $student->section_ID        = $request->student['section_ID'];
                $student->save();
                return $student;
            }
        }
    }

}
