<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'post_content' => 'required',
            'status' => 'required|integer'
        ]);

        if ($request->hasFile('formfile')) { 
            $form_file = $request->file('formfile')->store(options: 'documents');
        }else{
            $form_file = null;
        }

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->post_content;
        $post->image_url = $form_file;
        $post->userid = Auth::id();
        $post->status = $request->status;
        $post->save();

        return redirect()->route('admin')->with('status', 'Post saved successfully');
    }

    // public function new(){
    //     if(Auth::check()){
    //         return view('admin.new');
    //     }else{
    //         return view('login');
    //     }
    // }

    public function dashboard(){
        if(Auth::check()){
            $posts = Post::where('userid', Auth::id())->get();
            return view('admin.dashboard', ['posts'=>$posts]);
        }else{
            return view('login');
        }
    }

    public function index_posts(){
        $posts = Post::get();
        return view('index', ['posts' => $posts]);
    }

}
