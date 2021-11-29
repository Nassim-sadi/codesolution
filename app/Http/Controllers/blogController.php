<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
class blogController extends Controller
{
    public function getIndex() {

        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('blog.index')->withPosts($posts);
    }
    public function getSingle($slug) {
        //fetch from db based on slug
        $post=Post::where('slug',"=",$slug)->first();
        //return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }
}
