<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Validator;
class SystemUserController extends Controller
{
    // Show user profiles information
    public function index()
    {
        $userId = Auth::id();
        $getProfileInfo = UserProfile::where('user_id',$userId)->first();
        return view('system_users.view',compact('getProfileInfo'));
    }

    // View file for user profiles
    public function updateProfile()
    {
        $userId = Auth::id();
        $user = User::select('user_type')->where('id',$userId)->first();
        $user_type = $user->user_type;
        if($user_type==1){
            $userId = Auth::id();
            $getProfileDetails = UserProfile::where('user_id',$userId)->first();
            return view('system_users.parentprofile',compact('getProfileDetails'));
        }
        if($user_type==2){
            $userId = Auth::id();
            $getProfileDetails = UserProfile::where('user_id',$userId)->first();
            return view('system_users.teacherprofile',compact('getProfileDetails'));
        }
        if($user_type==3){
            $userId = Auth::id();
            $getProfileDetails = UserProfile::where('user_id',$userId)->first();
            return view('system_users.studentprofile',compact('getProfileDetails'));
        }
    }
    //upsert system profile
    public function upsertProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'student_id' => 'string|max:50',
            'teacher_id' => 'string|max:50',
            'phone' => 'required|string|min:10',
            'email' => 'required|email|max:50',
            'skypeId' => 'nullable|string|max:20',
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'city' => 'required|string|max:40',
            'street_address' => 'required|string|max:100',
            'state' => 'required|string|max:40',
            'country' => 'required|string|max:50',
            'profilePicture' => 'image|mimes:jpeg,png,jpg|max:2048', // Max file size: 2MB
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
        // Retrieve request data
        $name = $request->name;
        $studentId = $request->student_id;
        $teacherId = $request->teacher_id;
        $profession = $request->profession;
        $phone = $request->phone;
        $email = $request->email;
        $skypeId = $request->skypeId;
        $dateOfBirth = $request->dateOfBirth;
        $gender = $request->gender;
        $city = $request->city;
        $state = $request->state;
        $country = $request->country;
        $streetAddress = $request->street_address;
        $userId = Auth::id();
        $getProfileType = User::select('user_type')->where('id',$userId)->first();
        $profileType = $getProfileType->user_type;

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            // Generate unique filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            // Save file to storage
            //$file->storeAs('profile_pictures', $filename);
            // Get the full path to the stored file
           // $filePath = storage_path('app/profile_pictures/' . $filename);
            $file->storeAs('public/uploads', $filename);
           // Get the full path to the stored file
            $filePath = storage_path('app/storage/uploads/' . $filename);
            $data = [
                'user_id'=>$userId,
                'student_id'=>$studentId ?? '',
                'teacher_id'=>$teacherId ?? '',
                'profession'=>$profession ?? '',
                'name'=>$name,
                'phone'=>$phone,
                'skype_id'=>$skypeId,
                'date_of_birth'=>$dateOfBirth,
                'gender'=>$gender,
                'email'=>$email,
                'profile_type'=>$profileType,
                'city'=>$city,
                'state'=>$state,
                'country'=>$country,
                'profile_image'=>$filename,
                'profile_image_path'=>$filePath,
                'street_address'=>$streetAddress,
            ];
            $upsertProfile = UserProfile::updateOrCreate(
                ['user_id' => $userId], // Match records based on user_id
                $data // Data to be updated or inserted
            );
            if($upsertProfile){
                return response()->json([
                    'msg'=>'Data updated successfully',
                    'status'=>true,
                ]);
            }
        }
        else{
            $data = [
                'user_id'=>$userId,
                'student_id'=>$studentId ?? '',
                'teacher_id'=>$teacherId ?? '',
                'profession'=>$profession ?? '',
                'name'=>$name,
                'phone'=>$phone,
                'skype_id'=>$skypeId,
                'date_of_birth'=>$dateOfBirth,
                'gender'=>$gender,
                'email'=>$email,
                'profile_type'=>$profileType,
                'city'=>$city,
                'state'=>$state,
                'country'=>$country,
                'street_address'=>$streetAddress,   
            ];
     
            $upsertProfile = UserProfile::updateOrCreate(
                ['user_id' => $userId], // Match records based on user_id
                $data // Data to be updated or inserted
            );
            if($upsertProfile){
                return response()->json([
                    'msg'=>'Data updated successfully',
                    'status'=>true,
                ]);
            }
        }
    }
}
