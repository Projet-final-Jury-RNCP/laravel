<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<!--       <li class="nav-item active"> -->
<!--         <a class="nav-link" href="{{  url('/stock') }}">Home <span class="sr-only">(current)</span></a> -->
<!--       </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{  url('/admin/user') }}">Utilisateurs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stock
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="{{  url('/stock/shopping') }}"><b>Faire les courses</b></a>

<!--           <a class="dropdown-item" href="{{  url('/stock/consulter') }}"><b>Consulter</b></a> -->

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{  url('/stock/approvisionner') }}"><b>Approvisionner</b> (au retour des courses)</a>
          <a class="dropdown-item" href="{{  url('/stock/inventorier') }}">Inventorier (remise en l'état du stock)</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{  url('/stock/sortir') }}"><b>Sortie</b> de stock</a>
          <a class="dropdown-item" href="{{  url('/stock/retourner') }}">Retour en stock</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{  url('/stock/historique') }}">Historique du stock</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{  url('/stock/categories') }}">Categories</a>
          <a class="dropdown-item" href="{{  url('/stock/mesures') }}">Mesures</a>
          <a class="dropdown-item" href="{{  url('/stock/produits') }}">Produits</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{  url('/stock/documentation') }}">Aide</a>
      </li>
<!--       <li class="nav-item"> -->
<!--         <a class="nav-link" href="{{  url('/repas') }}">Repas</a> -->
<!--       </li> -->
    </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

  </div>
</nav>
