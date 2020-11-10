@extends('layouts.app')

@section( 'content')
    <table class="table table-hover">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <img src="{{$post->featured}}" alt="{{$post->title}}" width="90" height="50">
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{route('post.edit',['id'=>$post->id])}}">Edit</a>
                    </td>
                    <td>
                        
                        <a class="btn btn-danger btn-sm"  href="{{route('post.delete',['id'=>$post->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection