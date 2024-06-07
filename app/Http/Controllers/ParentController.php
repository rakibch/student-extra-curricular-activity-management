<?php

namespace App\Http\Controllers;

use App\Models\ParentAccess;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    //
    public function viewEnrollementAsParent()
    {
        $studentList = ParentAccess::with('parent_info', 'child_info')->get();
        return view('parent.viewenrollmentparent', compact('studentList'));
    }
    public function checkStudentId(Request $request)
    {
        $studentId = $request->student_id;
        $student = UserProfile::where('student_id', $studentId)->first();
        if ($student) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'name' => $student->name,
                    'student_id' => $student->student_id,
                    'profile_image' => $student->profile_image,
                ],
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Student not found']);
        }
    }
}
