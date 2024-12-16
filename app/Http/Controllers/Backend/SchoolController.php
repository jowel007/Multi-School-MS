<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function schoolList(){
        return view('backend.school.list');
    }

    public function CreateSchool(){
        return view('backend.school.create');
    }
}
