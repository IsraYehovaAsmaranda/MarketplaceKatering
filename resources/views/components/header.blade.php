<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="text-xl font-bold hidden md:block">
            Marketplace Katering
        </div>
        <div class="flex-1 mx-4">
            <input type="text" placeholder="Cari Makanan..."
                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
        </div>
        @if (Auth::check())
            <div class="flex items-center space-x-4 relative">
                <a type="button" href="/account" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50">Account</a>
            </div>
        @else
            <div class="flex items-center space-x-4">
                <a type="button" href="/logincustomer"
                    class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 {{ request()->is('logincustomer') ? 'pointer-events-none opacity-60 cursor-not-allowed' : '' }}">Login
                    Customer</a>
            </div>
            <div class="flex items-center space-x-4">
                <a type="button" href="/loginmerchant" {{ request()->is('/loginmerchant') ? 'disabled' : '' }}
                    class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 {{ request()->is('loginmerchant') ? 'pointer-events-none opacity-60 cursor-not-allowed' : '' }}">Login
                    Merchant</a>
            </div>
        @endif
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('dropdown-button');
        const menu = document.getElementById('dropdown-menu');

        if (!button || !menu) {
            console.error('Button or Menu element not found.');
            return;
        }

        // Create Popper instance
        const popperInstance = Popper.createPopper(button, menu, {
            placement: 'bottom-end',
        });

        // Toggle menu visibility on button click
        button.addEventListener('click', function() {
            menu.classList.toggle('hidden');
            popperInstance.update(); // Update Popper position if needed
            console.log('Button clicked, toggling menu visibility.');
        });

        // Hide menu if click outside
        document.addEventListener('click', function(event) {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                console.log('Click outside detected, hiding menu.');
            }
        });
    });
</script>
