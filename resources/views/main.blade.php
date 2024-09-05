<x-layout>
    <div class="container mx-auto p-4">
        <!-- Grid container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Card 1 -->
            @foreach ($foods as $food)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ $food['image_url'] }}" alt="Makanan 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $food->food_name }}</h2>
                        <p class="text-sm text-gray-500 mb-2">{{ $food->merchant->name }}</p>
                        <p class="text-sm text-gray-700 mb-2">{{ $food->description }}</p>
                        <p class="text-gray-600">Rp {{ number_format($food->price, 2, ',', '.') }}</p>
                        <!-- Tombol Tambah ke Keranjang -->
                        
                    </div>
                    <div class="p-4 align-bottom item">
                        <button onclick="addToCart('{{ $food->food_name }}', {{ $food->price }})"
                            class="flex items-center mt-2 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                            <i class="fas fa-shopping-cart mr-2"></i> Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
