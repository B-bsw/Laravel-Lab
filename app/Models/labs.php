<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labs extends Model
{
    use HasFactory;

    function researchers()
    {
        return $this->hasMany(researchers::class, 'lab_id', 'id');
    }

    function project()
    {
        return $this->hasMany(Projects::class, 'lab_id', 'id');
    }
}
