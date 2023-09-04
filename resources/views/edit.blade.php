@extends('layouts.app')

@section('title', 'Edit task')

@section('styles')
@endsection

@section('content')
  <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
    @csrf
    @method('PUT')
    <div>
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title" value="{{ $task->title }}" />
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="description">
        Description
      </label>
      <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <button type="submit">Edit Task</button>
    </div>
  </form>
@endsection
