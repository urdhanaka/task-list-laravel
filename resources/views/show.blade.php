@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>
  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>
  <div>
    <form action="{{ route('tasks.delete', ['task' => $task]) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit">Delete Task</button>
    </form>
  </div>
@endsection
