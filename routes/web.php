<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\projectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/greet", function () {
    return view("greet");
});

Route::get("/greeting", [GreetController::class, "greet"]);

//lab07
Route::get("/about", function () {
    return view("about");
});
Route::get("/book", [bookController::class, "index"]);
//lab07

//lab08
//lab09
Route::middleware([
    "auth:sanctum",
    config("jetstream.auth_session"),
    "verified",
])->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");
    Route::get("/lab", [LabController::class, "index"]);
    Route::get("/", [projectController::class, "index"]);
    Route::get("/projects", [projectController::class, "index"]);

    Route::get("/projects/create", [projectController::class, "showform"]);
    Route::post("/projects/create", [projectController::class, "addProject"]);

    Route::get("/projects/{id}", [projectController::class, "editform"]);
    Route::post("/projects/edit/{id}", [projectController::class, "update"]);

    Route::get("/projects/{id}/delete", [
        projectController::class,
        "destroy",
    ])->name("projects.destroy");

    Route::get("/restore", [projectController::class, "restore"]);
});
//lab09
//lab08
