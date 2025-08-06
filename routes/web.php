<?php

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/',function(){

    return redirect()->route('tasks.index');

});



Route::get('/tasks', function () {

    return view('index' ,[

        'tasks'=> Task::all() // Fetching all tasks from the database

        // 'tasks'=> \App\Models\Task::latest()->get() // Fetching all tasks from the database, sorted by the latest first (as a time of creation it)

        // 'tasks'=> Task::latest()->where('completed' , true)->get() //using here Query Builder "where" to fetch only completed tasks


  ]);

})->name('tasks.index');




Route::view('/tasks/create' , 'create')->name('tasks.create');


Route::get('/tasks/{id}',function ($id)  { //note that id is a primary key

    // $task=collect($tasks)->firstWhere('id', $id);
    // if (!$task) {;
    //     abort(Response::HTTP_NOT_FOUND);
    // }

    return view('show', [
        'task' =>Task::findOrFail($id)
    ]);

})->name('tasks.show');

Route::post('/tasks', function (Request $request) {

 // dd($request->all()); // This will dump all the request data and stop the execution


 //Validate the incoming request data

    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',  $task->id)->with('success', 'Task created successfully!');
    
})->name('tasks.store');







// Route::get('/hello', function () {
//     return 'hello every one ';
// })->name('hello world');

// // Dynamic route example --> to put dynamic content/parts  in the URL
// Route::get('/hello/{name}', function($name){
//     return 'hello ' . $name . '!';
// });

// // redirct from old URL to new/updated URL
// Route::get('hallo' , function(){
//    return redirect()->route('hello world');
// });

// // Fallback route for handling undefined routes
// Route::fallback(function () {
//     return 'Page not found';
// });
