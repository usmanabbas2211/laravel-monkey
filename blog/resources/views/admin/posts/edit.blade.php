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
            <h3>Edit post</h3>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('get')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$post->category_id}}"
                            @if($post->category_id==$category->id)
                                selected
                            @endif
                            >{{$category->name}}</option>
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
                        <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="ml-2"
                        @foreach($post->tags as $t)
                            @if($tag->id==$t->id)
                                checked
                            @endif
                        @endforeach
                        ><span class="ml-2 mb-1">{{$tag->tag}}</span>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success">Update Post</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection