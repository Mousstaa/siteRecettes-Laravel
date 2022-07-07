@extends('/layouts/main')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@section('content')

<div class="grid-x align-center">
    <div class="cell medium-10">
      <div class="blog-post">
        <ul>
            <article class="grid-container">
                <hr>
                <h2 class="text-center">Voici nos délicieuses recettes!</h2>
                <div class="grid-x grid-margin-x small-up-2 medium-up-2 large-up-4">
                    @foreach ( $recipes as $recipe )
                            <div class="cell">
                                <div class="callout">
                                <a href="/recipes/{{ $recipe->url }}"><img class="thumbnail" style="width: 300px;height: 150px;" src="{{asset('media')}}/{{$recipe->image}}"></a>
                                <div class="text-center">
                                 <a href="/recipes/{{ $recipe->url }}"> {{ $recipe->title }} </a>
                                </div>
                                </div>
                            </div>
                    @endforeach
                </div>

                {{-- Pagination links --}}
                <div align="center" class="d-flex justify-content-center">
                    {{$recipes->links("pagination::bootstrap-4")}}
                </div>

            </article>
        </ul>
      </div>
    </div>
</div>

@endsection
