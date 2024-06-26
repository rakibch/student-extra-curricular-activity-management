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
        'parent_id',
        'status',
    ];
}
