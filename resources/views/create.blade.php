
@extends ('layouts.app')

@section('title',"add tasks")
@section('content')

    <form method="POST" action="{{ route('task.store') }}">

        @csrf
        <div>
            <label for="title">
                title
            </label>
            <input name="title" id="title" type="text">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        <div>
            <label for="long_description">Long_descritpion</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">add task</button>
        </div>
    </form>

@endsection
