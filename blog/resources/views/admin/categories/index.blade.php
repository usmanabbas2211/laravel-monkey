@extends('layouts.app')

@section( 'content')
    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{route('category.edit',['id'=>$category->id])}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{route('category.delete',['id'=>$category->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection