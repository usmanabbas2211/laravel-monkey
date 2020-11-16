@extends('layouts.app');

@section('content')
    @if(count($errors))
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Create a new Tag</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('tag.store')}}" method="POST" >
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="tag" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Create</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection