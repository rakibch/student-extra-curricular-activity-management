<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    //
    public function viewEnrollementAsParent()
    {
        return view('parent.viewenrollmentparent');
    }
}
