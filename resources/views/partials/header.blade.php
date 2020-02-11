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
                    {{-- <span>2</span> --}}
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
                    <li><a href="{{ route('products.index') }}">Shop</a>
                        <ul class="sub-menu">
                           {{--  @foreach($categories as $category)
                            <li><a href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach --}}
                        </ul>
                    </li>
                    <li><a href="{{ route('pages.about') }}">About</a></li>
                    <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>