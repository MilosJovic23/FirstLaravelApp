<?php

    use App\Http\Requests\TaskRequset;
    use App\Models\Task;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function ()  {
        return redirect()->route('task.index');
    });

    Route::get('/tasks', function ()  {
        return view('index',[
            "tasks"=> Task::latest()->paginate(10)
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

    Route::post('/tasks', function (TaskRequset $request)  {

        $task = Task::create($request->validated());

        return redirect()->route('task.show',['task'=>$task->id])
            ->with('success','Task created successfully');
    })
    ->name('task.store');

    Route::put('/tasks/{task}', function (Task $task,TaskRequset $request)  {

        $task->update($request->validated());

        return redirect()->route('task.show',['task'=>$task->id])
            ->with('success','Task updated successfully');
    })
        ->name('task.update');

    Route::fallback(function () {
        return "Still got somewhere";
    });

    Route::delete('/tasks/{task}', function (Task $task)  {
        $task->delete();
        return redirect()->route('task.index')
            ->with('success','Task deleted successfully!');
    })->name('task.destroy');

    Route::put('/tasks/{task}/toggle-complete', function (Task $task)  {

        $task->toggleComplete();
        return redirect()->back()->with('success','Task updated successfully');
    })->name('task.toggle-complete');
