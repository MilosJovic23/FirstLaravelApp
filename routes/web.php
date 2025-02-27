<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('/', function ()  {
        return redirect()->route('task.index');
    });

    Route::get('/tasks', function ()  {
        return view('index',[
            "tasks"=> \App\Models\Task::latest()->get(),
        ]);
    })
    ->name('task.index');

    Route::view('/tasks/create' , 'create')
    ->name('task.create');

    Route::get('/tasks/{id}', function ($id)  {
        return view('show',['task' => \App\Models\Task::findOrFail($id)] );
    })
    ->name('task.show');

    Route::post('/tasks', function (Request $request)  {
        $data = ($request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ]));
    })
    ->name('task.store');

    Route::fallback(function () {
        return "Still got somewhere";
    });


