 <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="{{ route('pages.home') }}">
                        <h3>AVENCO</h3>
                    </a>
                </div>
                <div class="header-right">
                    <a href="">
                        <i class="search-trigger fas fa-search fa-lg"></i>
                    </a>
                    <a href="{{ route('settings.index') }}">
                        <i class="far fa-user fa-lg"></i>
                    </a>
                    <a href="{{ route('pages.cart') }}">
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
                        <a href="{{ route('api.logout') }}" class="in">Logout</a>
                    </div>
                @endauth
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="{{ route('pages.home') }}">Home</a></li>
                        <li><a href="{{ route('product.index') }}">Shop</a>
                            <ul class="sub-menu">
                                {{-- <li><a href="{{ route('product.category', ['slug' => $category->slug]) }}">Dresses</a></li> --}}
                                <li><a href="{{ route('pages.checkout') }}">Dresses</a></li>
                                <li><a href="{{ route('pages.checkout') }}">Dresses</a></li>
                                <li><a href="{{ route('pages.checkout') }}">Dresses</a></li>
                                <li><a href="{{ route('pages.checkout') }}">Dresses</a></li>
                                {{-- <li><a href="{{ route('pages.cart') }}">Shopping Cart</a></li>
                                <li><a href="{{ route('pages.checkout') }}">Check out</a></li> --}}
                            </ul>
                        </li>
                        <li><a href="{{ route('pages.about') }}">About</a></li>
                        <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>