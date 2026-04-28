<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Ramsey\Uuid\Type\Integer;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $posts = Post::paginate(3);
        return view('index', ['posts' => $posts]);
    }

    public function post_view(string $slug){
        if(Post::where('slug', $slug)->get()->count()){
            $post = Post::where('slug', $slug)->first();
            return view('post', ['post'=>$post]);
        }else{
            abort(404);
        }
    }

    public function search_res(Request $request){
        $search = $request->input('query');
        $posts = Post::whereAny(['title','slug','content'],'LIKE',"%$search%")->get();
        return view('search', ['posts' => $posts]);
    }

    public function generate_pdf(){
        $posts = Post::all();
        // return view('pdf', ['posts'=>$posts]);
        $pdf = Pdf::loadView('pdf', ['posts'=>$posts]);
        return $pdf->download();
    }
}
