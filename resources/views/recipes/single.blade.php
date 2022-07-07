@extends('/layouts/main')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="grid-x align-center">
    <div class="cell medium-8">
        <!-- Alert affiche un message si suppression ou modification est faite avec succes -->
        @if(session()->has('info'))
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{ session('info') }}
            </div>
        @endif
        <div class="blog-post">
        <h3 class="text-info">{{ $recipe->title }} </h3>
        <div align="center">
        <img class="thumbnail center-block" style="width: 600px;" src="{{asset('media')}}/{{$recipe->image}}">
        </div>
        <p><h5 class="text-info">Description:</h5> {{ $recipe->content }}</p>
        <p><h5 class="text-info">Ingredient:</h5> {{ $recipe->ingredients }}</p>
        <div class="callout">
          <ul class="menu simple">
            <li class="text-primary">
                @if (isset($author->name ))
                <span><i class="fi-torso"> Auteur: {{ $author->name }}</i></span>
                @else
                <span><i class="fi-torso"> Auteur: Momo</i></span>
                @endif
            </li>
            {{-- compteur de commentaire fonctionnel --}}
            <li class="text-primary">
                <span><i class="fi-comments"> Comments: {{ $recipe->comments->count() }}</i></span>
            </li>
          </ul>
        </div>

        {{-- Formulair de commentaires --}}
        <hr>
        <div class="card">
            <div class="card-block">

                <form method="POST" action="/recipes/{{ $recipe->id  }}/comments">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Votre commentaies..." required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publier</button>
                    </div>
                </form>

            </div>
        </div>

        {{-- Liste des commentaires --}}
        {{-- Afficher le contenu et le temps passer --}}
        @if ($recipe->comments->count() != 0)
            <h5>Commentaires:</h5>
        @else
            <h5 class="text-md-center">Aucun commentaire pour l'instant</h5>
            <h6 class="text-md-center">Soyer le premier à commenter :)</h6>
        @endif

        <div class="comments">
            <ul class="list-group">
                {{-- Afficher les commentaire  --}}
                @foreach ($recipe->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->created_at->diffForHumans() }}: </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>
        <hr><br/><br/>
      </div>
    </div>
</div>

@endsection
