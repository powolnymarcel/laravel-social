@extends('layouts.master')

@section('contenu')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            @include('includes.message_block')
            <header>
                <h3>Que voulez vous dire ?</h3>
                <form action="{{route('creation.post')}}" method="post">
                    <div class="form-group">
                        <textarea name="nouveau-post" id="nouveau-post" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Créer</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Les posts</h3>
                @foreach($posts as $post)
                    <article class="post">
                       <p>{{$post->texte}}</p>
                        <div class="info">
                            Posté par {{$post->utilisateur->nom}} le {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="">Like</a> |
                            <a href="">Dislike</a>

                            @if (Auth::user()==$post->utilisateur)
                                    <a href="">Edit</a> |
                                    <a href="{{route('post.supprimer',['post_id'=>$post->id])}}">supprimer</a>
                            @endif

                        </div>
                    </article>
                 @endforeach


            </header>
        </div>
    </section>
@endsection