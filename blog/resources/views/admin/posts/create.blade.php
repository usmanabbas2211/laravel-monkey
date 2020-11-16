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
            <h3>Create a new post</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Select Tags</label>
                @foreach($tags as $tag)
                    <div class="checkbox">
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="ml-2"><span class="ml-2 mb-1">{{$tag->tag}}</span>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Store Post</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection