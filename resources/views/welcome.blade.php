@extends('layouts.master')

@section('title')
    titre
    @endsection

@section('contenu')
    <div class="row">
        <div class="col-md-6">
            <h3>Inscription</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nom">Votre Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">Envoyer</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Connexion</h3>
            <form action="">
                <div class="form-group">
                    <label for="email">Votre email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                                <div class="form-group">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">Envoyer</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>    </div>
@endsection