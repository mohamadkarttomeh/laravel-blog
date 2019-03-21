<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
class PostsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , [ 'except' =>  [ 'show' , 'index'] ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at','DESC')->paginate(3);
        return   view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required', 
            'body' => 'required'

        ]);

        $user = Auth::user();
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = $user->id;
        $now = date('YmdHis');
        $post->slug = str_replace(' ','-',strtolower($post->title)).'-'.$now;
        $post->save();
        return redirect('/posts')->with('success' , 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     *
    
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $post = Post::where('slug' , $slug)->first();

        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);

        $user_id = Auth::id();
        if($user_id != $post->user_id)
        {
            return redirect('/posts')->with('error' , "that is not your post ");
        }
        return view('posts.edit' , compact('post'));
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
        //

        $request->validate([
            'title' => 'required', 
            'body' => 'required'

        ]);


        $post = Post::find($id) ;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = str_replace(' ','-',strtolower($post->title));

        $user_id = Auth::id();
        if($user_id != $post->user_id)
        {
            return redirect('/posts')->with('error' , "that is not your post ");
        }

        $post->save();

        return redirect('/posts/'.$post->slug)->with('success' , 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $user_id = Auth::id();
        if($user_id != $post->user_id)
        {
            return redirect('/posts')->with('error' , "that is not your post ");
        }
        
        $post->delete();
        return redirect('/posts')->with('success' , 'Post deleted successfully');


    }
}
