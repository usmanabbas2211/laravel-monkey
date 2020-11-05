@extends('layout')

@section('content')
    <div class="">
        <form action="create/todo" method="POST">
            @csrf
            @method('post')
            <input type="text" class="form-control col-md-6 offset-md-3" name="todo" placeholder="Create new Todo" id="">
        </form>
    </div>
    @foreach($todos as $todo)
    <div style="">
        {{$todo->todo}}
        <a href="{{route('todos.delete',['id'=>$todo->id])}}" class="btn btn-danger">x</a>
        <a href="{{route('todos.update',['id'=>$todo->id])}}" class="btn btn-primary btn-xs">update</a>
        @if($todo->completed==0)
            <a href="{{route('todos.complete',['id'=>$todo->id])}}" class="text-dark "><i class="fa fa-check fa-2x"></i></a>
        @else
            <a href="{{route('todos.uncomplete',['id'=>$todo->id])}}" class="text-success "><i class="fa fa-check fa-2x"></i></a>
        @endif
        <br>
    </div>
    @endforeach

@endsection