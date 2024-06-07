<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidebarmenu extends Model
{
    use HasFactory;
    protected $table = 'sidbar_menus';
    protected $fillable = [
        'name',
        'icon',
        'permission_id',
        'permission_name',
        'url'
    ];
}
