<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class researchers extends Model
{
    use HasFactory;

    function labs()
    {
        return $this->belongsTo(labs::class);
    }
}
