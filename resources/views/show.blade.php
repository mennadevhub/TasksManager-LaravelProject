@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <p>{{$task->description}}</p>
    @if($task->long_description)
        <p>Long Description: {{$task->long_description}}</p>
    @endif
    <p>Created at: {{$task->created_at}}</p>
    <p>Updated at: {{$task->updated_at}}</p>

    <form action="{{ route('tasks.destroy' , ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
   </form>

@endsection

