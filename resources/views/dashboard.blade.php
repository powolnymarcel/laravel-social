@extends('layouts.master')

@section('contenu')
    <section class="row new-post">
        <div class="col-md-6 md-offset-3">
            <header>
                <h3>Que voulez vous dire ?</h3>
                <form action="">
                    <div class="form-group">
                        <textarea name="nouveau-post" id="nouveau-post" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Créer</button>
                </form>
            </header>
        </div>
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-3-offset">
            <header>
                <h3>BLGLERBEB</h3>
                <article class="post">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, consequatur deleniti dicta distinctio, dolor eius enim incidunt ipsam laborum minus rem repudiandae rerum sequi tempore totam unde vel vitae voluptates.
                    </p>
                    <div class="info">
                        Posté par Mama le 15 du 33
                    </div>
                    <div class="interaction">
                        <a href="">Like</a> |
                        <a href="">Dislike</a>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </div>
                </article>
            </header>
        </div>
    </section>
@endsection