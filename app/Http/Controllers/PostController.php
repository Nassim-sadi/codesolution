<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Session;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //restrict this controller to auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        //create a variable and store the posts from database
        //$posts = Post::orderBy('id', 'desc')->paginate(5);
        //return a view and pas in the above variable
        return view('posts.index')->with('posts', $user->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the data
        $this->validate($request, array(
            'title' => 'required|max:119',
            //'slug' => 'required|alpha_dash|min:5|max:119',
            'body' => 'required',
            'tags' => 'required|array',
        ));
        //Store the Data
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->get('title'));
        $post->body = Purifier::clean($request->body)  ;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tags()->sync($request->tags, false);
        Session::flash('success', 'The blog post was successfully Stored');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post the db and save it as variable
        $post = Post::find($id);
        $tags = Tag::all();
        //return the view then pass in the var previously created
        return view('posts.edit')->withPost($post)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validate the data
            $this->validate($request, array(
                'title' => 'required|max:119',
                //'slug' => 'required|alpha_dash|min:5|max:119|unique:posts,slug',
                'body' => 'required',
            ));
        //save the data to DB
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->get('title'));
        $post->body = Purifier::clean($request->input('body'));
        $post->save();
        if (isset($request->tags)){
            $post->tags()->sync($request->tags,true);
        }else{
            $post->tags()->sync(array());
        }
        //set flassh data with success masg
        Session::flash('success', 'The changes was successfully saved.');
        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'The Post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
