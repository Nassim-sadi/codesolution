<?php

namespace App\Http\Controllers;

use  App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Session;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {   if(\Auth::check()){
        $this->validate($request,array(
            'body'=>'required|min:5'
        ));
        $post=Post::find($post_id);
        $comment=new Comment();
        $comment->body = Purifier::clean($request->body) ;
        $comment->user()->associate(Auth()->user()->id) ;
        $comment->post()->associate($post);
        $comment->save();
        \Session::flash('success','Your comment was added');
        return redirect()->route('blog.single',[$post->slug]);
    }else{
        Session::flash('info','you must login First');
        return back();
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
