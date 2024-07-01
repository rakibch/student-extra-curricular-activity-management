<?php

namespace App\Http\Controllers;

use App\Models\EnrolledUserActivity;
use App\Models\ParentChild;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    //
    public function viewChildrenActivity()
    {
        $userID=Auth::id();
        $fetchStudentActivities = ParentChild::where('parent_id',$userID)->get();
        $data=[];
        foreach($fetchStudentActivities as $key=>$value)
        {
            $studentId = $value->children_id;
            $fetchJoinedActivityInfo = EnrolledUserActivity::with('activity_details','user_details')->where('user_id',$studentId)->get();
            foreach($fetchJoinedActivityInfo as $key1=>$value1)
            {
                $data[] = [
                    'activiity_name'=>$value1->activity_details->activity_name??'',
                    'activiity_location'=>$value1->activity_details->activity_location??'',
                    'student_name'=>$value1->user_details->name??'',
                    'student_id'=>$value1->user_details->student_id??'',
                ];
            }
        }
        return view('parent.viewchildrensactivity',compact('data'));
    }
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
            $dataList[] =[
                'id'=>$value->id,
                'parent_name'=>$value->parent->name ??'',
                'children_name'=>$value->child->name ??'',
                'student_id'=>$value->child->student_id??'',
                'class'=>$value->child->class??'',
                'status'=>$value->status??'',
                'user_profile_id'=>$value->user_profile_id,
            ];   
        }
        // echo "<pre>";
        // print_r($dataList);
        // exit();
        return view('parent.parentapplicationaccept',compact('dataList'));
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
            return redirect()->route('view.parent.application')->with('success', 'Application as parent successful approved');
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
            return redirect()->route('view.parent.application')->with('deleleteApplicationMsg', 'Application as parent successfully removed');
        }   
    }
}
