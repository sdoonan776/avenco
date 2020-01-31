<header class="main-header w-full z-30 top-0 border">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

       {{--  <label for="menu-toggle" class="cursor-pointer hidden block">
            <i class="fas fa-bars fa-xl"></i>
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" /> --}}


        <div class="">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="{{ route('pages.home') }}">
                AVENCO
            </a>
        </div>

        <nav class="text-serif tracking-wide hidden md:inline-block order-2 items-center" role="main-nav-content">
           <ul class="flex">
                <li class="mr-3">
                    <a href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="mr-3">
                    <a href="{{ route('auth.register') }}">Register</a>
                </li>
                <li></li>
                <li></li>
            </ul> 
        </nav>

        <nav class="md:hidden order-2 flex items-center" role="mobile-nav-content">

            <a class="inline-block no-underline hover:text-black mr-2" href="#">
                <i class="fas fa-bars fa-xl"></i>
            </a>

            <a class="inline-block no-underline hover:text-black mr-2" href="#">
                <i class="far fa-user fa-xl"></i>
            </a>

            <a class="inline-block no-underline hover:text-black" href="#">
               <i class="fas fa-shopping-cart fa-xl"></i>
            </a>
        </nav>
    </div>
</header>