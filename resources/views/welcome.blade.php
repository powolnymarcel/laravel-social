@extends('layouts.master')

@section('title')
    titre
    @endsection

@section('contenu')
    <div class="row">
        <div class="col-md-6">
            @include('includes.message_block')
            <h3>Inscription</h3>
            <form action="{{route('inscription')}}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' :''}}">
                    <label for="email">Votre email</label>
                    <input type="email" name="email" id="email" value="{{Request::old('email')}}" class="form-control">
                </div>
                <div class="form-group {{$errors->has('nom') ? 'has-error' :''}}">
                    <label for="nom">Votre Nom</label>
                    <input type="text" name="nom" id="nom" value="{{Request::old('nom')}}" class="form-control">
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error' :''}}">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" name="password" id="password" value="{{Request::old('password')}}" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">Envoyer</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Connexion</h3>
            <form action="{{route('connexion')}}" method="post">
                <div class="form-group {{$errors->has('email') ? 'has-error' :''}}">
                    <label for="email">Votre email</label>
                    <input type="email" name="email" id="email" value="{{Request::old('email')}}" class="form-control">
                </div>
                                <div class="form-group {{$errors->has('password') ? 'has-error' :''}}">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" name="password" value="{{Request::old('password')}}" id="password" class="form-control">
                </div>
                <button class="btn btn-default" type="submit">Envoyer</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>    </div>
@endsection