
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recettes si bon ! </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
    <!-- optional CDN for Foundation Icons ^^ -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>

    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">Miam miam!</li>
          <li><a href="/">Accueil</a></li>
          <li><a href="/recipes">Recettes</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>

      <div class="top-bar-right">
        <ul class="menu">
            {{-- condition pour rechercher si page admin ou autre que admin --}}
            @if(\Request::is('admin') || \Request::is('searchadmin'))
                <form action="{{ url('/searchadmin') }}" type="GET">
                    <div class="top-bar-left">
                        <ul class="menu">
                            <li><input type="search" name="query" placeholder="Rechercher..."></li>
                            <li><button type="submit" class="button">Rechercher</button></li>
                        </ul>
                    </div>
                </form>
            @else
                <form action="{{ url('/search') }}" type="GET">
                    <div class="top-bar-left">
                        <ul class="menu">
                            <li><input type="search" name="query" placeholder="Rechercher..."></li>
                            <li><button type="submit" class="button">Rechercher</button></li>
                        </ul>
                    </div>
                </form>
            @endif
            {{-- afficher 'Adminstartion' et 'Deconnexion' si deja identifier sinon afficher 'Vous etes adminstarteur ?' --}}
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline"><b>Administration</b></a>
                    @guest
                        <li {{ currentRoute('login') }}>
                            <a href="{{ route('login') }}">@lang('Login')</a>
                        </li>
                    @else
                        <li>
                            <form action="{{ route('logout') }}" method="POST" hidden>
                                @csrf
                            </form>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.previousElementSibling.submit();">
                                @lang('Déconnexion')
                            </a>
                        </li>
                    @endguest

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><b>Vous êtes administrateur ?</b></a>
                    @endauth
            @endif
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <article class="grid-container">
        @yield('content')
    </article>

    <footer>
        <div class="medium-6 cell">
            <ul class="menu align-center">
                <li class="menu-text">UE PWCS | MIASHS WIC - Tout droit réservé 2021</li>
            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
