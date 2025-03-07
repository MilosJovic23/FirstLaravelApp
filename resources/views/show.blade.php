
@extends('layouts.app')

@section('title', $task->title)

@section('content')

        <nav class="mb-4">
            <a href="{{ route('task.index') }}"
               class="link">← Go back to the task list!</a>
        </nav>
            <p class="mb-4 text-slate-700">{{ $task->description }}</p>
            @if($task->long_description)
                <p class="text-slate-700">{{$task->long_description}}</p>
            @endif
            <p class="mb-4 text-sm text-slate-500">created {{ $task->created_at->diffForHumans() }} • updated {{ $task->updated_at->diffForHumans() }}</p>


        <p>
            @if($task->completed)
                <span class="font-medium text-green-500">Completed</span>
            @else
                <span class="font-medium text-red-500">Not Completed</span>
            @endif

        </p>

        <div class="flex gap-2 mt-2">
                <a href="{{ route('task.edit',['task'=>$task]) }}"
                class="btn">Edit</a>

            <form method="POST" action="{{ route('task.toggle-complete',['task'=>$task]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">Mark as {{ $task->completed ? 'Not completed' : 'Completed' }} </button>
            </form>

            <form action="{{ route('task.destroy',['task'=>$task->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn">delete</button>
            </form>
        </div>
@endsection
