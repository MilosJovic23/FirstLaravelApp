
    <h1>The list of tasks</h1>

    <div>

            @forelse($tasks as $task)
                <div>
                    <p>{{$task->title}}</p>
                    <p>{{$task->description}}</p>
                    <p>{{$task->created_at}}</p>
                </div>
                @empty
                <div>There is no tasks</div>
           @endforelse

    </div>
