@extends('layouts.app')

@section( 'content')
    <table class="table table-hover">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" 
                        style="border-radius: 50%" width="70" height="70">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        @if($user->admin)
                            <a href="{{route('user.not_admin',['id'=>$user->id])}}" class="btn btn-danger btn-sm">Remove admin</a>
                        @else
                            <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success btn-sm">Make Admin</a>
                        @endif
                    </td>
                    <td>
                        
                        <a class="btn btn-danger btn-sm"  href="{{route('post.delete',['id'=>$user->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection