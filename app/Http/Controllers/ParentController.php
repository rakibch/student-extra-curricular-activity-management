<?php

namespace App\Http\Controllers;

use App\Models\ParentChild;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    //
    public function viewEnrollementAsParent()
    {
        $fetchStudentList = UserProfile::where('profile_type',3)->paginate(4);
        return view('parent.viewenrollmentparent',compact('fetchStudentList'));
    }

    public function applyAsParent($id)
    {
        $update = UserProfile::where('id',$id)->update(['is_applied_by_parent'=>1]);
        $studentInfo = UserProfile::where('id',$id)->first();
        $studenId = $studentInfo->id;
        $parentId = Auth::id();
        
        $parentChild = ParentChild::updateOrInsert(
            ['parent_id' => $parentId, 'children_id' => $studenId],
            ['parent_id' => $parentId, 'children_id' => $studenId]
        ); 
        if($parentChild)
        {
            return redirect()->route('enrollment.parent')->with('success', 'Application as parent successful');
        }
    }

    public function removeApplication($id)
    {
        $update = UserProfile::where('id',$id)->update(['is_applied_by_parent'=>0]);
        $studentInfo = UserProfile::where('id',$id)->first();
        $studentId = $studentInfo->id;
        $parentId = Auth::id();

        $parentChild = ParentChild::where('parent_id', $parentId)
        ->where('children_id', $studentId)
        ->delete();

        if($parentChild)
        {
            return redirect()->route('enrollment.parent')->with('deleleteApplicationMsg', 'Application as parent removed');
        }
    }
}
