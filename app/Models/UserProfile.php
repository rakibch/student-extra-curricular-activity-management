<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'city',
        'state',
        'country',
        'street_address',
        'phone',
        'email',
        'skype_id',
        'profession',
        'date_of_birth',
        'profile_image',
        'profile_image_path',
        'profile_type',
        'profile_id',
        'gender',
        'student_id',
        'teacher_id',
        'is_applied_by_parent'
    ];
    public function enrolledUserActivities()
    {
        return $this->hasMany(EnrolledUserActivity::class, 'user_id', 'user_id');
    }
}
