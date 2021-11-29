<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $users = User::withCount('comments')->orderBy('comments_count','desc')->take(10)->get();
        return view('Pages.index')->with('posts',$posts)->with('users',$users);

    }
    

    public function getContact()
    {
        return view('Pages.contact');
    }

    public function getAbout()
    {
        return view('Pages.About');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10',
        ));
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('nacimbreeze@gmail.com');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your email has been sent');
        return redirect('/');
    }
}


