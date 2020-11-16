<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Post;
use App\Tag;
use Session;
use Str;
class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        if($categories->count()==0){
            Session::flash('fail','You have to create some category');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',category::all())
                                        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);
        $featured=$request->featured;

        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>Str::slug($request->title)
        ]);
        $post->tags()->attach($request->tags);
        Session::flash('success','Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('admin/posts/edit')->with('post',$post)
                                        ->with('categories',category::all())
                                        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category'=>'required'
        ]);
        $post=Post::find($id);
        if($request->hasFile('featured')){
            $featured=$request->featured;
            $featured_new_name=time(). $featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
            $post->featured='uploads/posts/'.$featured_new_name;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success','Post Updated Successflly');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        Session::flash('success','Post deleted successfully');
        return redirect()->back();
    }
    public function trashed(){
        $posts=Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function kill($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post deleted permanently');
        return redirect()->back();
    }
    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post restored');
        return redirect()->back();
    }
}
