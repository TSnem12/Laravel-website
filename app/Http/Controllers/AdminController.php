<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (

            'message' => 'User logged out Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile() {
        
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function edit() {

        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
        
    }

    public function store(Request $request) {

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('image')) {

            $file = $request->file('image');

            $filename = date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $filename);

            $data['image'] = $filename;
        } 

        $data->save();

        $notification = array (

            'message' => 'Admin Profile Updated Successfully', 
            'alert_type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    
    }
 

    public function ChangePassword() {

        return view('admin.admin_change_password');

    }

    public function UpdatePassword(Request $request) {

        $validateData = $request->validate([

            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->old_password, $hashedPassword)) {

            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);

            $users->save();

            $notification = array(
                'message' => 'Password Updated Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Old password is not match',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
            
            
            
        }
    }

}
