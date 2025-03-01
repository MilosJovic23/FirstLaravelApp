<?php

    use App\Models\Task;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function ()  {
        return redirect()->route('task.index');
    });

    Route::get('/tasks', function ()  {
        return view('index',[
            "tasks"=> Task::latest()->get(),
        ]);
    })
    ->name('task.index');

    Route::view('/tasks/create' , 'create')
    ->name('task.create');


    Route::get('/tasks/{task}/edit', function (Task $task)  {
        return view('edit',[
            'task' => $task
        ] );
    })->name('task.edit');

    Route::get('/tasks/{task}', function (Task $task)  {
        return view('show',[
            'task' => $task
        ] );
    })->name('task.show');

    Route::post('/tasks', function (Request $request)  {
        $data = ($request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ]));
        $task = new Task;
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()->route('task.show',['id'=>$task->id])
            ->with('success','Task created successfully');
    })
    ->name('task.store');

    Route::put('/tasks/{task}', function (Task $task,Request $request)  {
        $data = ($request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ]));

        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();

        return redirect()->route('task.show',['id'=>$task->id])
            ->with('success','Task updated successfully');
    })
        ->name('task.update');


    Route::fallback(function () {
        return "Still got somewhere";
    });


