
@extends('layouts.app')

@section('title', isset($task) ? "Edit tasks" : "Add task")

@section('styles')
    <style>
        .error-message{
            color: #ff4343;
            font-size: 0.8rem;
        }
        .
    </style>
@endsection

@section('content')

<form method="POST" action="{{ isset($task) ? route('task.update',['task'=>$task->id]) : route('task.store') }}">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">
            title
        </label>
        <input name="title" id="title" type="text" value="{{ $task->title ?? old('title') }}">
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" >{{ $task->description ?? old('description') }}</textarea>
        @error('description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">long description</label>
        <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">
            @isset($task)
                Update task
            @endisset
            Add task
        </button>
    </div>
</form>

@endsection
