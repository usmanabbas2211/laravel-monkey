@extends('layouts.app')

@section( 'content')
    <table class="table table-hover">
        <thead>
            <th>Tag Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{route('tag.edit',['id'=>$tag->id])}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{route('tag.delete',['id'=>$tag->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection