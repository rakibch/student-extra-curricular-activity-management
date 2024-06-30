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
        $studenId = $studentInfo->user_id;
        $userProfileId = $studentInfo->id;
        $parentId = Auth::id();
        
        $parentChild = ParentChild::updateOrInsert(
            ['parent_id' => $parentId, 'children_id' => $studenId],
            ['parent_id' => $parentId, 'children_id' => $studenId,'user_profile_id' => $userProfileId,]
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

    public function parentApplicationList()
    {
        $data = ParentChild::with('parent','child')->get();
        foreach($data as $key=>$value)
        {
            $data[] =[
                'id'=>$value->id,
                'parent_name'=>$value->parent->name ??'',
                'children_name'=>$value->child->name ??'',
                'student_id'=>$value->child->student_id??'',
                'class'=>$value->child->class??'',
                'status'=>$value->status??'',
                'user_profile_id'=>$value->user_profile_id,
            ];   
        }
        return view('parent.parentapplicationaccept',compact('data'));
    }

    public function acceptParentApplicationbyAdmin($id)
    {
        $userProfileId = $id;
        $updateRecord = ParentChild::where('user_profile_id',$userProfileId)->update(
            ['status'=>3]
        );
        if($updateRecord)
        {
            $updateUserProfileRecord = UserProfile::where('id',$userProfileId)->update(
                ['is_applied_by_parent'=>2]
            );
            //need to work in here to set this route pareameter at night 
            return redirect()->route('accept.approve.by.admin')->with('success', 'Application as parent successful approved');
        }   
    }

    public function removeApplyasParentByAdmin($id)
    {
        $userProfileId = $id;
        $updateRecord = ParentChild::where('user_profile_id',$userProfileId)->update(
            ['status'=>2]
        );
        if($updateRecord)
        {
            $updateUserProfileRecord = UserProfile::where('id',$userProfileId)->update(
                ['is_applied_by_parent'=>3]
            );
            return redirect()->route('accept.approve.by.admin')->with('deleleteApplicationMsg', 'Application as parent successfully removed');
        }   
    }
}
