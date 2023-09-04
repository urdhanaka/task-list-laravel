@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>There are no tasks</div>
  @endforelse
@endsection
