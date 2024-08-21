<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        @auth
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        @else
            <a class="navbar-brand" href="{{ route('login') }}">{{ config('app.name') }}</a>
        @endauth

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">LogOut</a>
            </li>
          @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @endauth
        </ul>
        <span class="navbar-text">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </span>
      </div>
    </div>
  </nav>
