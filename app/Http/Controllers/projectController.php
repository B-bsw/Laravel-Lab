<?php

namespace App\Http\Controllers;

use App\Models\labs;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class projectController extends Controller
{
    function index()
    {
        $projects = new Projects();
        $project = $projects::with("labs")->get();
        return view("projects", compact("project"));
    }

    function addProject(Request $request)
    {
        $projects = new Projects();
        $projects->project_name = $request->name;
        $projects->budget = $request->budget;
        $projects->lab_id = $request->labAb;
        $projects->save();

        return redirect('projects');
    }

    function showform()
    {
        $lab = new labs();
        $labs = $lab::all();
        $title = "Add";
        return view('createProject', compact("labs", 'title'));
    }

    function editform(String $id)
    {
        $lab = new labs();
        $labs = $lab::all();
        $title = "Edit";

        $projects = Projects::findOrFail($id);
        return view('createProject', compact("projects", "title", 'id',  'labs'));
    }

    function update(Request $req, String $id)
    {
        $projects = projects::find($id);
        $projects->project_name = $req->name;
        $projects->budget = $req->budget;
        $projects->lab_id = $req->labAb;
        $projects->save();

        return redirect('projects');
    }

    function destroy(String $id)
    {
        $projects = Projects::findOrFail($id);
        $projects->delete();

        return redirect('projects');
    }

    function restore(){
        $restore = Projects::withTrashed();
        $restore->restore();
        return redirect('/projects');
    }
}
