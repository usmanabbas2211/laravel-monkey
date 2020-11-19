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
            <h3>Create a new Category</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('settings.update')}}" method="post" >
            @csrf
            @method('post')
            <div class="form-group">
                <label for="name">Site Name</label>
            <input type="text" value="{{$settings->site_name}}" name="site_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{$settings->contact_email}}" name="contact_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Contact Number</label>
            <input type="text" value="{{$settings->contact_number}}" name="contact_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Address</label>
            <input type="text" value="{{$settings->address}}" name="address" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection