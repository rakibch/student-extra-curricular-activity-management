<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentChild extends Model
{
    use HasFactory;
    protected $table="parent_childs";
    protected $fillable = [
        'parent_id',
        'children_id',
        'status',
        'user_profile_id'
    ];
    public function parent()
    {
        return $this->belongsTo(UserProfile::class, 'parent_id', 'user_id');
    }
    public function child()
    {
        return $this->belongsTo(UserProfile::class, 'children_id', 'user_id');
    }


}
