<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class FrontController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('homepage',compact('activities'));
    }
}
