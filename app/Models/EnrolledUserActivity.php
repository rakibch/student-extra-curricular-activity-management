<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledUserActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_id',
        'user_id',
        'enroll_status',
    ];

    public function activity_details()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

    public function user_details()
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }

    public static function userCountForActivity($activityId)
    {
        return self::where('activity_id', $activityId)->where('enroll_status',2)->count();
    }

    public static function isEnrolled($userId,$activityId)
    {
        $res = self::select('enroll_status')->where('user_id',$userId)->where('activity_id',$activityId)->first();
        if($res)
        {
            if($res->enroll_status==1 )
            {
                return 1;
            }
            if($res->enroll_status==0 )
            {
                return 0;
            }
            if($res->enroll_status==2)
            {
                return 2;
            }
        }
        else
        {
            return 0;
        }
    }
    
}
