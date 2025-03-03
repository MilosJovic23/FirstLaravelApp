


@extends('layouts.app')

@section('title', "The list of tasks")

    <h1>The list of tasks</h1>
@section('content')
            @forelse($tasks as $task)
                <div>
                    <a href="{{ route('task.show',['task'=>$task->id]) }}">{{$task->title}}</a>
                </div>
                @empty
                <div>There is no tasks</div>
           @endforelse
    @if($tasks->count())
        <nav>  {{ $tasks->links() }} </nav>

    @endif
@endsection

