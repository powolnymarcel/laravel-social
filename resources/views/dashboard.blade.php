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
                    <article class="post" data-postid="{{$post->id}}">
                       <p>{{$post->texte}}</p>
                        <div class="info">
                            Posté par {{$post->utilisateur->nom}} le {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="" class="like">Like</a> |
                            <a href="" class="like">Dislike  </a>@if (Auth::user()==$post->utilisateur)|@endif

                        @if (Auth::user()==$post->utilisateur)

                                    <a href="" data-toggle="modal" data-target="#modal-edit" class="editer">Edit</a> |
                                    <a href="{{route('post.supprimer',['postid'=>$post->id])}}">supprimer</a>
                            @endif

                        </div>
                    </article>
                 @endforeach


            </header>
        </div>
    </section>


    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editer le post</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                            <div class="form-group">
                                <label for="texte">Editer</label>
                                <textarea class="form-control" name="texte" id="texte" cols="30" rows="5"></textarea>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="enregister">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
    <script>
        var token='{{Session::token()}}';
        var urlEditer= '{{route('editer')}}';
        var urlLike= '{{route('like')}}';
    </script>
