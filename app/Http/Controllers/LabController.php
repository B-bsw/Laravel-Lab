<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabController extends Controller
{
    function index()
    {
        $labs =  DB::select("SELECT * FROM labs");
        return view("lab", compact("labs"));
    }
}
