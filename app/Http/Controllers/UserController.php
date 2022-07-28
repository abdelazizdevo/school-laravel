<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * List the user
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        return view('users.list');
    }

    /**
     * Add New user
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = $this->store($request);
            return redirect('users/edit/' . $user->id);
        }
        return view('users.add',[
            'edit'      => false,
            'title'     => 'Add New user'
        ]);
    }

    /**
     * Edit user
     *
     * @return \Illuminate\View\View
     */
    public function edit($ID, Request $request)
    {
        if ($request->isMethod('post')) {
            $this->store($request);
        }
        return view('users.add',[
            'edit'      => true,
            'user'      => User::find($ID),
            'title'     => 'Edit user'
        ]);
    }

    /**
     * Delete user
     *
     * @return \Illuminate\View\View
     */
    public function delete($ID)
    {
        User::find($ID)->delete();
        return back()->withInput();
    }





    /**
     * Store user Data
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            if(isset($request->user['ID'])){
                $user = User::find($request->user['ID']);
            }else{
                $user = new User();
            }
            $user->name      = $request->user['name'];
            $user->role         = $request->user['role'];
            $user->email     = $request->user['email'];
            if(isset($request->user['password']) && !empty($request->user['password'])){
                $user->password = Hash::make($request->user['password']);
            }
            if($request->file('image')){
                $file       = $request->file('image');
                $filename   = date('YmdHi') . $file->getClientOriginalName();
                $file->move(base_path('images'), $filename);
                $user->image = $filename;
            }
            $user->save();
            return $user;
        }

        return view('admin.users.add');
    }
}
