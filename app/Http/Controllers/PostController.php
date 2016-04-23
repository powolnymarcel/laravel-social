<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function postCreationPost(Request $request)
    {
        //Validation
        $this->validate($request, [
            'nouveau-post' => 'required|max:1000|',
        ]);

        $post = new Post();
        $post->texte = $request['nouveau-post'];
        $message = 'Une erreur s\'est produite';
        if ($request->user()->posts()->save($post)) {
            $message = 'Message enregistré !';

        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function getSupprimerPost($postid)
    {
        $post = Post::where('id', $postid)->first();
        if (Auth::user() != $post->utilisateur) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Message supprimé avec succes.']);
    }

    public function postEditerPost(Request $request)
    {
        $this->validate($request, [
            'texte' => 'required'
        ]);

        $post = Post::find($request['postId']);
        if (Auth::user() != $post->utilisateur) {
            return redirect()->back();
        }
        $post->texte = $request['texte'];
        $post->update();
        return response()->json(['nouveau_texte' => $post->texte], 200);
    }


    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        //Va recevoir un string donc on converti en Boollean
        //$clickSurLike= $request['clickSurLike'] === 'true' ? true : false;
        $clickSurLike = $request['clickSurLike'] === 'true';

        $miseAjour = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $utilisateur = Auth::user();
        $like = $utilisateur->likes()->where('post_id', $post_id)->first();
        //Si il n'y a pas de like ou dislike,alors cela veut dire que l'user n'a pris aucunes actions sur le post
        //Si il y une action, je veux verif si je like ou dislike
        if ($like) {
            //On accède à la propriete de like pour voir sa valeur, si la valeur retournée est TRUE alors on like deja, si FALSE alors on dislike
            $aDejaLiker = $like->like;
            $miseAjour = true;
            //Si on like déjà le post alors on veut annuler le like si on clique sur le btn like
            //Si on like déjà et on clique sur dislike on veut mettre la valeur de like à FALSE

            //Si "$aDejaLiker" (entrée qui se trouve en BDD) est égal à ce que la requete envoie ça veut dire que on veut annuler son action
            if ($aDejaLiker == $clickSurLike) {
                $like->delete();
                return null;
            }

        } else {
            //
            $like = new Like();
        }
        //Dans tous les autres cas on veut attribuer une valeur à like qui se trouve en BDD
        $like->like = $clickSurLike;
        $like->utilisateur_id = $utilisateur->id;
        $like->post_id = $post_id;
        //Si on avait déjçà une entrée alors on update
        if ($miseAjour) {
            $like->update();
        } else {
            $like->save();
        }
        return null;


    }


}
