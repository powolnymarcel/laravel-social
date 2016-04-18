<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postCreationPost(Request $request){
        //Validation
        $this->validate($request,[
            'nouveau-post'=>'required|max:1000|',
        ]);

        $post=new Post();
        $post->texte = $request['nouveau-post'];
        $message='Une erreur s\'est produite';
        if ($request->user()->posts()->save($post)){
            $message='Message enregistré !';

        }

        return redirect()->route('dashboard')->with(['message'=>$message]);
    }

    public function getDashboard()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$posts]);
    }

    public function getSupprimerPost($post_id)
    {
        $post=Post::where('id',$post_id)->first();
        if (Auth::user() != $post->user ){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Message supprimé avec succes.']);
    }




}
