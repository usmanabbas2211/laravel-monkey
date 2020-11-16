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
            <h3>Update Tag</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('tag.update',['id'=>$tag->id])}}" method="POST" >
            @csrf
            @method('HEAD')
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" value="{{$tag->tag}}" name="tag" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection