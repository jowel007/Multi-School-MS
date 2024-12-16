<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class SchoolController extends Controller
{
    public function schoolList(){
        $data['getSchool'] = User::getSchool();
        return view('backend.school.list', $data);
    }

    public function CreateSchool(){
        return view('backend.school.create');
    }

    public function AddSchool(Request $request){
        // dd($request->all());

        request()->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user                = new User;
        $user->name          = trim($request->name);
        $user->email         = trim($request->email);
        $user->password      = Hash::make($request->password);
        $user->address       = trim($request->address);
        $user->status        = trim($request->status);
        $user->is_admin      = 3;
        $user->created_by_id = Auth::user()->id;
        $user->save();

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/school_profile/',$filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/school')->with('success','School Inserted Successfully');


    }
}
