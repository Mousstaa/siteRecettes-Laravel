@extends('/layouts/main')


@section('content')
<br/>
<div class="callout large primary">
    <div class="text-center">
      <h1>C'est si bon !</h1>
      <h2 class="subheader">Recettes faciles et rapides et surtout délicieuses !</h2>
    </div>
</div>

<div class="callout large secondary">
    <div class="text-center">
        <article class="grid-container">
            <h2>Voici nos trois dernières recettes</h2>
            <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-3">
                @foreach ( $recipes as $recipe )
                        <div class="cell">
                            <div class="callout">
                            <a href="/recipes/{{ $recipe->url }}"><img class="thumbnail" style="width: 300px;height: 200px;" src="{{asset('media')}}/{{$recipe->image}}"></a>
                            <div class="text-center">
                             <a href="/recipes/{{ $recipe->url }}"> {{ $recipe->title }} </a>
                            </div>
                            </div>
                        </div>
                @endforeach
            </div>
            <h4>Envie de voir plus? <a href="/recipes">par ici!</a> </h4>
        </article>
    </div>
</div>


@endsection
