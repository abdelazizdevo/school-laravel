<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function List(Request $request){
        if (Auth::user()->can_do('sections.manage')) {
            if ($request->isMethod('post')) {
                $guide = $this->store($request);
            }
            return view('sections.list');
        }
    }

    public function store(Request $request){
        if (Auth::user()->can_do('sections.manage')){
            if($request->isMethod('POST')){
                if(isset($request->section['ID'])){
                    $section         = Section::find($request->section['ID']);
                }else{
                    $section         = New Section();
                }
                $section->name       = $request->section['name'];
                $section->save();
                return $section;
            }
        }
    }

}
