<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class UtilisateurController extends Controller
{
    public function postInscription(Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email|max:120|unique:Utilisateurs',
            'nom'=>'required|max:25',
            'password'=>'required|min:6',

        ]);



        $email = $request['email'];
        $nom = $request['nom'];
        $password = bcrypt($request['password']);

        $utilisateur=new Utilisateur();
        $utilisateur->email=$email;
        $utilisateur->nom=$nom;
        $utilisateur->password=$password;

        $utilisateur->save();
        Auth::login($utilisateur);
        return redirect()->route('dashboard');

    }

    public function postConnexion(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',

        ]);

       if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
           return redirect()->route('dashboard');
       };
        return redirect()->back();

    }

    
    
    
    
  public function getDeconnexion()
  {
      Auth::logout();
      return redirect()->route('accueil');

  }

public function getCompte()
{
    return view('compte',['utilisateur'=>Auth::user()]);
}


public function postMettreAjourCompte(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required|max:120'
        ]);
        $utilisateur = Auth::user();
        $utilisateur->nom=$request['nom'];
        $utilisateur->update();

        // file('image') correspond au name dans le form
        $fichier = $request->file('image');
        //L'image aura comme nom : exemple -> jean-3.jpg
        $nomFichier= $request['nom'].'-'.$utilisateur->id.'.jpg';
       if ($fichier){
           Storage::disk('local')->put($nomFichier,File::get($fichier));
       }
        return redirect('compte');

    }

public function getUtilisateurImage($nomfichier){

    $fichier= Storage::disk('local')->get($nomfichier);
    return new Response($fichier,200);
    }
}
