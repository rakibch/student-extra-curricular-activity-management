<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAccess extends Model
{
    use HasFactory;
    protected $table='parent_accesses';

    public function parent_info()
    {
        return $this->belongsTo(UserProfile::class, 'parent_user_id', 'user_id');
    }
    public function child_info()
    {
        return $this->belongsTo(UserProfile::class, 'child_user_id ', 'user_id');
    }
}
