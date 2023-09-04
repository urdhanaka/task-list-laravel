@extends('layouts.app')

@section('title', @isset($task) ? 'Edit task' : 'Add task')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div>
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" />
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="description">
        Description
      </label>
      <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <button type="submit">
        @isset($task)
          Update Task
        @else
          Add Task
        @endisset
      </button>
    </div>
  </form>
@endsection
