<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\EnrolledUserActivity;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ActivityController extends Controller
{
    //
    public function index()
    {
        $getTeachersInfo = User::where('user_type', 2)->get();
        return view('activity.show', compact('getTeachersInfo'));
    }

    public function approveActivityEnrollment($id)
    {
        $approveEnrollement = EnrolledUserActivity::where('id',$id)->update(
            ['enroll_status'=>2,]
        );
        if($approveEnrollement)
        {
            return redirect()->back();
        }
    }

    public function rejectActivityEnrollment($id)
    {
        $approveEnrollement = EnrolledUserActivity::where('id',$id)->update(
            ['enroll_status'=>0,]
        );
        if($approveEnrollement)
        {
            return redirect()->back();
        }
    }
    public function submit(Request $request)
    {
        $userId = Auth::id();

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            // Generate unique filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            // Save file to storage
            $file->storeAs('public/uploads', $filename);
            // Get the full path to the stored file
            $filePath = storage_path('app/storage/uploads/' . $filename);
            $activityWithImage = new Activity();
            $activityWithImage->activity_name = $request->acitivity_name;
            $activityWithImage->activity_location = $request->activity_location;
            $activityWithImage->activity_description = $request->activity_description;
            $activityWithImage->start_date = $request->start_date;
            $activityWithImage->end_date = $request->end_date;
            $activityWithImage->created_by = $userId;
            $activityWithImage->activity_image = $filename;
            $activityWithImage->activity_image_path = $filePath;
            $saveActivity = $activityWithImage->save();

            if ($saveActivity) {
                return response()->json([
                    'msg' => 'Data updated successfully with image',
                    'status' => true,
                ]);
            }
        } else {
            $activity = new Activity();
            $activity->activity_name = $request->acitivity_name;
            $activity->activity_location = $request->activity_location;
            $activity->activity_description = $request->activity_description;
            $activity->start_date = $request->start_date;
            $activity->end_date = $request->end_date;
            $activity->created_by = $userId;
            $saveActivity = $activity->save();
            if ($saveActivity) {
                return response()->json([
                    'msg' => 'Data inserted successfully without image',
                    'status' => true,
                ]);
            }
        }
    }

    public function listActivity()
    {
        $getActivities = Activity::with('userInfo')->get();
        return view('activity.list', compact('getActivities'));
    }

    public function activityDelete(Request $request)
    {
        $id = $request->id;
        $activity = Activity::find($id);
        if (!$activity) {
            return redirect()->back()->with('error', 'Activity not found.');
        }
        // Delete the activity
        $activity->delete();
        return response()->json(['success' => 'Activiey deleted successfully']);
    }

    public function editActivities($id)
    {
        $getActivityDetails = Activity::with('userInfo')->find($id);
        return view('activity.edit', compact('getActivityDetails'));
    }

    public function updateActivities(Request $request)
    {
        $id = $request->id;
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            // Generate unique filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            // Save file to storage
            $file->storeAs('public/uploads', $filename);
            // Get the full path to the stored file
            $filePath = storage_path('app/storage/uploads/' . $filename);

            $data = [
                'activity_name' => $request->acitivity_name,
                'activity_location' => $request->activity_location,
                'activity_description' => $request->activity_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'created_by' => $request->userId,
                'activity_image' => $filename,
                'activity_image_path' => $filePath,
            ];

            $updateActivityWithImage = Activity::where('id', $id)->update($data);
            if ($updateActivityWithImage) {
                return response()->json([
                    'msg' => 'Data updated successfully with image',
                    'status' => true,
                ]);
            }
        } else {
            $data = [
                'activity_name' => $request->acitivity_name,
                'activity_location' => $request->activity_location,
                'activity_description' => $request->activity_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'created_by' => $request->userId,
            ];
            $updateActivityWithImage = Activity::where('id', $id)->update($data);
            if ($updateActivityWithImage) {
                return response()->json([
                    'msg' => 'Data updated successfully without image',
                    'status' => true,
                ]);
            }
        }

        //print_r($request->all());
    }

    public function enrollActivity()
    {
        $totalActivityList = Activity::all();
        $userId = Auth::id();
        foreach ($totalActivityList as $key => $value) {
            $activityList[] = [
                'activity_image' => $value->activity_image,
                'activity_name' => $value->activity_name,
                'activity_location' => $value->activity_location,
                'userCount' => EnrolledUserActivity::userCountForActivity($value->id),
                'start_date' => $value->start_date,
                'end_date' => $value->end_date,
                'id' => $value->id,
                'status' => EnrolledUserActivity::isEnrolled($userId, $value->id),
            ];
        }
        return view('activity.enroll', compact('activityList', 'userId'));
    }

    public function updateRecord(Request $request)
    {
        $activityId = $request->id;
        $userId = $request->userId;
        $status = $request->status;
        $updateEnrollRecord = EnrolledUserActivity::updateOrCreate(
            ['activity_id' => $activityId, 'user_id' => $userId], // $attributes
            ['enroll_status' => $status] // $values
        );
        if ($updateEnrollRecord) {
            //echo $status;
            return response()->json(['status' => 200, 'msg' => 'Susccessfully updated']);
        }
    }

    public function enrollmentApplicationList()
    {
        $fetchAllEnrollmentApplication = EnrolledUserActivity::with('activity_details','user_details')->get();
        return view('activity.applied',compact('fetchAllEnrollmentApplication'));
    }
}
