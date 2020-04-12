<header class="header-section">
    <div class="inner-header">
        <div class="logo">
            <a href="{{ route('home.index') }}">
                <h3>AVENCO</h3>
            </a>
        </div>
        <ul class="header-right">
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="far fa-user fa-lg"></i>
                </a>
            </li>        
            <li>
                <a href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span>{{ Cart::count() }}</span>
                </a>
            </li>
        </ul>
        <nav class="main-menu mobile-menu">
            <ul>
                <li><a href="{{ route('home.index') }}">Home</a></li>
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
                @guest
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endguest
                @auth 
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit();">Logout</a>
                        <form class="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
    <nav class="mobile-navbar">
        <button class="menu-button" type="button" aria-expanded="false">
          <i class="fas fa-bars fa-1x"></i>
        </button>
        <ul class="navbar-content">
          <li>
            <a class="nav-link" href="{{ route('home.index') }}">
                Home
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('shop.index') }}">
                Shop
            </a>
          </li>
          @guest
                <li>
                    <a class="nav-link" href="{{ route('register') }}">
                        Register
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            @endguest
            @auth 
                <li>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit();">Logout</a>
                    <form class="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
                </li>
            @endauth   
        </ul>
    </nav>
</header>