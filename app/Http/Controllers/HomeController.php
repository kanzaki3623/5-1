<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at' , 'desc') -> get();
        return view('home') -> with('posts' , $posts);
    }
    public function save(Request $request)
    {
        $request -> validate([
            'text' => 'required|max:255' 
        ]);
        $user_id = Auth::id();
        $post = new Post;
        $post -> user_id = $user_id;
        $post -> body = $request->text;
        $post -> save();
        return redirect() -> route('home');
    }
    public function delete(Request $request)
    {
        $post = Post::find($request -> id);
        $post -> delete();
        return redirect() -> route('home');
    }
}
