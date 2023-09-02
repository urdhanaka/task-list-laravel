@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>
  <p>{{ $task->createdAt }}</p>
  <p>{{ $task->updatedAt }}</p>
@endsection
