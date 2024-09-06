<x-layout>
    {{-- Register Card --}}
    <div class="flex justify-center min-h-screen items-center bg-blue-200 p-4">
        <div class="bg-white shadow-md border border-gray-200 rounded-lg w-full max-w-md p-6 sm:p-8 lg:w-1/3">
            <form class="space-y-6" action="/registermerchant" method="POST">
                @csrf
                <h3 class="text-xl font-bold text-center text-gray-900">Register Merchant</h3>

                {{-- Include pesan error --}}
                @include('components.Message')

                <div>
                    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your Name" required="">
                </div>

                <div>
                    <label for="address" class="text-sm font-medium text-gray-900 block mb-2">Address</label>
                    <input type="text" name="address" id="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your company's address" required="">
                </div>

                <div>
                    <label for="contact" class="text-sm font-medium text-gray-900 block mb-2">Contact</label>
                    <input type="number" name="contact" id="contact"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Your company's contact" multiple required="">
                </div>

                <div>
                    <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="description" id="description" rows="3" placeholder="Description of your company"></textarea>
                </div>

                <div>
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="email@gmail.com" required="">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required="">
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register
                    Now</button>

                <div class="text-sm font-medium text-gray-500 text-center">
                    Have an account already? <a href="/register" class="text-blue-700 hover:underline">Login
                        Here</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
