<header class="main-header w-full z-30 top-0 border">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <div class="">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="{{ route('pages.home') }}">
                AVENCO
            </a>
        </div>

        <nav class="text-Varela tracking-wide hidden md:inline-block order-2 items-center" role="main-nav-content">
           <ul class="flex">
                {{-- <li class="mr-6">
                    <a href="{{ route('auth.login') }}">LOGIN</a>
                </li>
                <li class="mr-6">
                    <a href="{{ route('auth.register') }}">REGISTER</a>
                </li> --}}
                <li></li>
                <li></li>
            </ul> 
        </nav>

        <nav class="order-2 flex items-center" role="mobile-nav-content">

            <a class="inline-block no-underline hover:text-black mr-6" href="#">
                <i class="fas fa-bars fa-xl"></i>
            </a>

            <a class="inline-block no-underline hover:text-black mr-6" href="#">
                <i class="fab fa-user fa-xl"></i>
            </a>

            <a class="inline-block no-underline hover:text-black mr-6" href="#">
               <i class="fab fa-shopping-cart fa-xl"></i>
            </a>
        </nav>
    </div>
</header>