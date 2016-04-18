<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use Illuminate\Http\Request;
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

        return redirect()->route('dashboard');

    }

    public function postConnexion(Request $request)
    {
        $email = $request['email'];
        $password =$request['password'];
    }

    public function getDashboard()
    {
        return view('dashboard');
    }







}
