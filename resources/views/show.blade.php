@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>
  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>
@endsection
