<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_name',
        'activity_image',
        'activity_image_path',
        'activity_location',
        'activity_description',
        'created_by',
        'start_date',
        'end_date',
    ];

    public function userInfo(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function enrolledUsers(){
        return $this->hasMany(EnrolledUserActivity::class, 'activity_id', 'id');
    }

    public function userCount(){
        return $this->enrolledUsers()->count();
    }
}
