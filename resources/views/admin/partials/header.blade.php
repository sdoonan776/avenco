<nav class="bg-gray-900 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
		<div class="flex w-full pt-2 content-center justify-between md:w-full md:justify-end mb-3">
			<ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
			    <li class="flex-1 md:flex-none md:mr-3">
				    <a class="inline-block py-2 px-4 text-white no-underline" href="{{ route('admin.index') }}">Dashboard</a>
			    </li>
			    <li class="flex-1 md:flex-none md:mr-3">
				    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4 text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit();">Logout</a>
				    <form class="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
			    </li>
            </ul>
        </div>
    </div>
</nav>