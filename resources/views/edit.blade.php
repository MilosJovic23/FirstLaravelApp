
@extends ('layouts.app')

@section('title',"Edit tasks")
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
    <form method="POST" action="{{ route('task.update',['task'=>$task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                title
            </label>
            <input name="title" id="title" type="text" value="{{$task->title}}">
            @error('title')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" >{{$task->description}}</textarea>
            @error('description')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">long description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
            <p class="error-message">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit task</button>
        </div>
    </form>

@endsection
