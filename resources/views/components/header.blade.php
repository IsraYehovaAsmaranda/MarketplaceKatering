<header class="bg-white shadow-md sticky top-0">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="text-xl font-bold hidden md:block">
            <a href="/">Marketplace Katering</a>
        </div>
        <div class="flex-1 mx-4 flex items-center space-x-2">
            <input type="text" placeholder="Cari Makanan..."
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            <button type="button"
                class="py-2 px-4 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        @if (Auth::check())
            <div class="flex items-center space-x-2 relative">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button"
                        class="btn m-1 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ \Illuminate\Support\Str::limit(Auth::user()->name, 15, '...') }} </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @if (Auth::user()->is_merchant)
                            <li><a href="/menu">Your Menu</a></li>
                        @else
                            <li><a href="/cart">Your Cart</a></li>
                        @endif
                        <li><a href="/account">Account Settings</a></li>
                        <li><a class="text-red-500" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        @else
            <!-- Tombol untuk layar kecil -->
            <div class="flex items-center space-x-4 md:hidden">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button"
                        class="btn m-1 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li><a href="/logincustomer">Customer</a></li>
                        <li><a href="/loginmerchant"></a></li>
                    </ul>
                </div>
            </div>

            <!-- Tombol untuk layar besar -->
            <div class="hidden md:flex items-center space-x-4">
                <a type="button" href="/logincustomer"
                    class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 {{ request()->is('logincustomer') ? 'pointer-events-none opacity-60 cursor-not-allowed' : '' }}">
                    Login Customer
                </a>
                <a type="button" href="/loginmerchant"
                    class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 {{ request()->is('loginmerchant') ? 'pointer-events-none opacity-60 cursor-not-allowed' : '' }}">
                    Login Merchant
                </a>
            </div>
        @endif
    </div>
</header>
