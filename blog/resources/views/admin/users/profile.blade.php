@extends('layouts.app')

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
            <h3>Edit Your Profile</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('get')
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password"  class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="">About</label>
                <textarea name="about" id="" cols="36" rows="6" class="form-control">
                    {{$user->profile->about}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="email">Facebook Profile</label>
                <input type="text" value="{{$user->profile->facebook}}" name="facebook" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Youtube Profiles</label>
                <input type="text" value="{{$user->profile->youtube}}" name="youtube" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection