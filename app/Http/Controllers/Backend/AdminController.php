<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class AdminController extends Controller
{
    public function AdminList()
    {
        $data['getRecord'] = User::getAdmin();
        return view('backend.admin.list', $data);
    }

    public function CreateAdmin()
    {
        return view('backend.admin.create');
    }

    public function AddAdmin(Request $request)
    {
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
        $user->is_admin      = trim($request->is_admin);
        $user->created_by_id = Auth::user()->id;
        $user->save();

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/admin_profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/admin')->with('success', 'Admin Inserted Successfully');
    }

    public function EditAdmin($id)
    {
        $data['getRecord'] = User::getSingleEditData($id);
        $data['meta_title'] = 'Edit Admin';
        return view('backend.admin.edit', $data);
    }


    public function UpdateAdmin($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user                = User::getSingleEditData($id);
        $user->name          = trim($request->name);
        $user->email         = trim($request->email);
        if (!empty($request->password)) {
            $user->password      = Hash::make($request->password);
        }
        $user->address       = trim($request->address);
        $user->status        = trim($request->status);
        $user->is_admin      = trim($request->is_admin);
        $user->save();

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/admin_profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/admin')->with('success', 'Admin Updated Successfully');
    }


    public function DeleteAdmin($id)
    {
        $user            = User::getSingleEditData($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/admin')->with('danger', 'Admin Deleted Successfully');
    }
}
