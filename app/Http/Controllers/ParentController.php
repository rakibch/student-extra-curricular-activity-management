<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    //
    public function viewEnrollementAsParent()
    {
        $fetchStudentList = UserProfile::where('profile_type',3)->paginate(4);
        return view('parent.viewenrollmentparent',compact('fetchStudentList'));
    }
}
