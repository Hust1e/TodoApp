<style>
        @import url("css/app.css");
</style>
<x-app-layout>
    @section('content')
        <x-flash-message/>
        @if(isset($tasks))
            <div class="container-sm">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <h2>My tasks in progress</h2>
                    @foreach($tasks as $task)
                        @if($task->is_completed == 0)
                            <div class="accordion-item bg-opacity-100">
                                <h2 class="accordion-header" id="{{ $task->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="{{ "#flush" . $task->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ $task->name }}
                                    </button>
                                </h2>
                                <div id="{{ "flush" . $task->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{{$task->description}} </div>
                                    <div>
                                        Created at: {{ $task->created_at }}
                                    </div>
                                    <div class="d-flex">
                                        <form action="{{ route('task.edit', $task->id) }}" method="get">
                                            <input type="submit" class="btn btn-primary" value="Edit">
                                        </form>
                                        <form action="{{ route('task.complete', $task->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="submit" class="btn btn-success" value="Complete">
                                        </form>
                                        <form action="{{ route('task.delete', $task->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="empty-task">
                <h1>You don't have active tasks</h1>
                <form action="{{ route('task.create') }}" method="get">
                    <input type="submit" class="btn btn-primary" value="Add them!">
                </form>
            </div>
        @endif
    @endsection
</x-app-layout>
