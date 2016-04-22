@extends('layouts.master')
@section('titre')
    Mon compte

    @endsection



@section('contenu')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Mon compte</h3></header>
            <form action="{{ route('compte.sauvegarder') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $utilisateur->nom }}" id="nom">
                </div>
                <div class="form-group">
                    <label for="image">Image (uniquement .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <!--  "if "   Sera uniquement affiché si on a un fichié stocké   -->
    <!--  Le moteur "Storage" de Laravel sera utilisé, comme son nom l'indique, il stocke les fichiers dans un endroit précis (voir le folder Storage)       -->
    @if (Storage::disk('local')->has($utilisateur->nom . '-' . $utilisateur->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <!--     On fetch l'image via une route, cette route actionnera un Ctrl qui renverra le bon fichier  -->
                <!--    Etant donné que le dossier storage est protége on a besoin d'une route spéciale pour recuperer le src   -->
                <img src="{{ route('compte.image', ['nomfichier' => $utilisateur->nom . '-' . $utilisateur->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif
@endsection