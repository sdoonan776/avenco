@extends('layouts.main')

@section('title', 'Home')

@section('main')
      <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
				Store
			</a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                        </a>

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                        </a>

                    </div>
              </div>
            </nav>

            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <a href="#">
                    <div role="product-image" class="">
                        
                    </div>
                    
                    <div class="pt-3 flex items-center justify-between">
                        <p class="">Product Name</p>
                    </div>
                    <p class="pt-1 text-gray-900">£9.99</p>
                </a>
            </div>
    	</div>
    </section>
@endsection