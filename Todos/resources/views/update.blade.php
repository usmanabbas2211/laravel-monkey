@extends('layout')

@section('content')
    <div class="col-md-12">
        <form action="{{route('todos.save',['id'=>$todo->id])}}" method="POST">
            @csrf
            @method('head')
            <input type="text" class="form-control col-md-6 offset-md-3" value="{{$todo->todo}}" name="todo" placeholder="Create new Todo" id="">
        </form>
    </div>
   

@endsection