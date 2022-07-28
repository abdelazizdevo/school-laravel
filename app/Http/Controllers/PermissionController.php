<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post') && isset($request->permissions)){
            Permission::truncate();
            foreach ($request->permissions as $key => $val) {
                foreach ($val as $user_ID){
                    $Permission                 = new Permission();
                    $Permission->permission     = $key;
                    $Permission->user_ID        = $user_ID;
                    $Permission->save();
                }
            }
        }
        return view('permissions.index');
    }
}
