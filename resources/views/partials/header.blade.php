<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="logo">
                <a href="{{ route('pages.home') }}">
                    <h3>AVENCO</h3>
                </a>
            </div>
            <div class="header-right">
                <a href="{{ route('settings.index') }}">
                    <i class="far fa-user fa-lg"></i>
                </a>
                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span>{{ Cart::count() }}</span>
                </a>
            </div>
            @guest
                <div class="user-access">
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}" class="in">Login</a>
                </div>
            @endguest
            @auth
                <div class="user-access">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
                </div>
            @endauth
            <nav class="main-menu mobile-menu">
                <ul>
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li><a href="{{ route('shop.index') }}">Shop</a>
                        <ul class="sub-menu">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="slicknav_menu">
        <nav class="navbar navbar-light purple lighten-4 mb-4">
          <button class="navbar-toggler toggler-example purple darken-3" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent41" aria-controls="navbarSupportedContent41" aria-expanded="false"
            aria-label="Toggle navigation"><span class="white-text"><i class="fas fa-bars fa-1x"></i></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent41">

            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.home') }}">
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('shop.index') }}">
                    Shop
                </a>
              </li>
            </ul>
          </div>
        </nav>
    </div>
</header>