@extends('layouts.app')

@section( 'content')
    <table class="table table-hover">
        <thead>
            <th>Image</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Restore</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @if($posts->count()>0)
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
                        
                        <a class="btn btn-primary btn-sm"  href="{{route('post.restore',['id'=>$post->id])}}">Restore</a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm"  href="{{route('post.kill',['id'=>$post->id])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No Trashed Posts</th>
                </tr>
            @endif
        </tbody>
    </table>
@endsection