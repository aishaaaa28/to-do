<?php
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[TaskController::class,"index"]);

Route::post("/add",function(){
    $content = $_POST["content"];
    $date=now();

    $status = Task::create(["content"=> $content,"date"=> $date]);
    if($status){
       return redirect()->action([TaskController::class,"index"]);
    }

    abort(404);
});

Route::post("/delete", function()
{
    $id = $_POST['id'];
    $taskToDelete= Task::destroy($id);
    if ($taskToDelete) {
        return redirect()->action([TaskController::class,"index"]);
    }
});

Route::get("/completed/{id}",[TaskController::class, "completed" ])->name("tasks.completed");
