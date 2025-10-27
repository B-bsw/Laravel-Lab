<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    function labs()
    {
        return $this->belongsTo(labs::class, 'lab_id', 'id');
    }
}
