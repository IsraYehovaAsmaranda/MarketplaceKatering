<x-layout>
    {{-- Login Card --}}
    <div class="flex justify-center min-h-screen items-center bg-blue-200 p-4">
        <div class="bg-white shadow-md border border-gray-200 rounded-lg w-full max-w-md p-6 sm:p-8 lg:w-1/3">
            <form class="space-y-6" action="/loginmerchant" method="POST">
                @csrf
                <h3 class="text-xl font-bold text-center text-gray-900">Login Merchant</h3>

                {{-- Include pesan error --}}
                @include('components.Message')

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
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                    to your account</button>

                <div class="text-sm font-medium text-gray-500 text-center">
                    Not registered? <a href="/registermerchant" class="text-blue-700 hover:underline">Create
                        account</a>
                </div>

                <div class="mt-4 text-center">
                    <a class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-block"
                        href="/">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
