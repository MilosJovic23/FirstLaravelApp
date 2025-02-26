


@extends('layouts.app')

@section('title', "The list of tasks")

    <h1>The list of tasks</h1>
@section('content')
            @forelse($tasks as $task)
                <div>
                    <a href="{{ route('task.show',['id'=>$task->id]) }}">{{$task->title}}</a>
{{--                    <p>{{$task->description}}</p>--}}
{{--                    <p>{{$task->created_at}}</p>--}}
                </div>
                @empty
                <div>There is no tasks</div>
           @endforelse
@endsection

