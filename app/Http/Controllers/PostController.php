<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::get();
        //return  "<img src='".$posts->photo_name."' />" ;
         return view('posts.viewPosts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.addPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
       
        
        $id = Auth::user()->id;
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $filename = $request->file('image')->getClientOriginalName();
        $saved = $request->image->storeAs('public', $filename);
        $post->photo_name = Storage::url($filename);
        $post->user_id = $id;
        $post->save();
        
        if($saved){

             return redirect('/posts');
        }
        
        }
        else{
            return  "No File is selected";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.editPost', compact('post'));
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
        $title = $request->title;
        $body = $request->body;
        $post = Post::where('id', $id)
        ->update(['title' => $title, 'body' => $body]);
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $filename = substr($post->photo_name, 9); 
        $public = 'public/';
        $url = $public.$filename;
        $deleted = Storage::delete($url);
        if($deleted){
        
        $post->delete();
        session()->flash('message', 'Delete Successfully');
       return redirect('/posts');
    }
        return 'not deleted';
    }
}
