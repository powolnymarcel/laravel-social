<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('dashboard')}}">Social@net </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            </ul>
            @if (Auth::user())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('compte')}}">Compte</a></li>
                    <li><a href="{{route('deconnexion')}}">Deconnexion</a></li>
                </ul>
            @endif

        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>