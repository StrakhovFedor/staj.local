<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/addTaskInBD', function(Request $request){
    $task = $request->get('task');
    $taskTitle = $request->get('task_title');

    Task::create([
        'task' => $task,
        'task_title' => $taskTitle,
        'user_id' => auth()->id()
    ]);

    return redirect('/dashboard');
})->name('add.task.bd');

Route::get('/addTask' , function(Request $request){
    return view('addtask');
})->name('add.task');

Route::post('/deleteTask', function(Request $request){
    $taskID = $request->get('task_id');

    Task::where('id',$taskID)
        ->delete();

    return redirect('/dashboard');
})->name('delete.task');

Route::get('/dashboard', function () {

    $tasks = User::where('id',auth()->id())
        ->with('tasks')->first()->toArray();

    return view('dashboard',[
        'tasks' => $tasks['tasks']
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
