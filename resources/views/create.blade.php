@extends('layouts.app')

@section('title', 'Add task')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0, 8rem;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
      <label for="title">
        Title
      </label>
      <input text="text" name="title" id="title" />
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="description">
        Description
      </label>
      <textarea name="description" id="description" rows="5"></textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <button type="submit">Add Task</button>
    </div>
  </form>
@endsection
