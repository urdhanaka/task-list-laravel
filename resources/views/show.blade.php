@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>
  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  <p>
    @if ($task->completed)
      Completed
    @else
      Not Completed
    @endif
  </p>

  <div>
    <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
  </div>

  <div>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
      @csrf
      @method('PUT')
      <button type="submit">
        Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
      </button>
    </form>
  </div>

  <div>
    <form action="{{ route('tasks.delete', ['task' => $task]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Delete Task</button>
    </form>
  </div>
@endsection
