@extends('layouts.app')

{{-- <h1>Tasks List</h1> --}}
@section('title', 'Tasks List')


    {{-- @if (count($tasks))
      @foreach ( $tasks as $task )
            <div> {{$task->title}} </div>
      @endforeach
    @else
        <div> There are no Tasks!</div>

    @endif() --}}


@section('content')

    @forelse ($tasks as $task)
        <div> <a href="{{route('tasks.show' , [ 'id'=> $task->id ] )}}"> {{ $task->title }} </a> </div>
    @empty
        <div> There are no Tasks!</div>
    @endforelse

@endsection





