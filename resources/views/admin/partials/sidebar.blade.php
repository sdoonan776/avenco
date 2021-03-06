
<div class="bg-gray-900 shadow-lg h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
    <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
        <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
            <li class="mr-3 flex-1">
                <a href="{{ route('admin.users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Users</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{ route('admin.products.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500">
                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Products</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{ route('admin.orders.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-gray-800 hover:border-blue-500 border-b-2">
                    <span class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Orders</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{ route('admin.categories.index') }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-red-500">
                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Categories</span>
                </a>
            </li>
            <li class="mr-3 flex-1">
                <a href="{{ route('admin.coupons.index') }}" class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-yellow-500">
                    <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Coupons</span>
                </a>
            </li>
        </ul>
    </div>
</div>
