<x-layout>
    <div class="container mx-auto p-4">
        @include('components.message')
        <!-- Grid container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-4">
            <!-- Card 1 -->
            @foreach ($foods as $food)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ $food->image_url }}" alt="Makanan {{ $food->food_name }}"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $food->food_name }}</h2>
                        <p class="text-sm text-gray-500 mb-2">{{ $food->merchant->name }}</p>
                        <p class="text-sm text-gray-700 mb-2">{{ $food->description }}</p>
                        <p class="text-gray-600">Rp {{ number_format($food->price, 2, ',', '.') }}</p>
                    </div>
                    <div class="p-4 align-bottom item">
                        <button onclick="updateCartModal(this); cartmodal.showModal()"
                            data-productname="{{ $food->food_name }}" data-productid="{{ $food->id }}"
                            class="flex items-center mt-2 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Dialog For Cart --}}
    <dialog id="cartmodal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="/" method="POST">
                @csrf
                <h3 id="modal-title" class="text-lg font-bold">Add to Cart</h3>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Quantity</span>
                        </div>
                        <input type="number" placeholder="Qty" name="qty" id="qty"
                            class="input input-bordered w-full" maxlength="3" required />
                        <input type="number" placeholder="id" name="id" id="id"
                            class="input input-bordered w-full" maxlength="3" required hidden />
                    </label>
                </div>
                <div class="modal-action">
                    <button type="submit"
                        class="py-2 px-4 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">Add
                        to Cart</button>
            </form>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </dialog>
</x-layout>

<script>
    function updateCartModal(button) {
        // Get Data From Button
        const productName = button.getAttribute('data-productname');
        const productId = button.getAttribute('data-productid');

        // Change modal title
        const modalTitle = document.querySelector('#modal-title');
        modalTitle.textContent = `Add ${productName} to Cart`;

        const hiddenIdInput = document.querySelector('#id');
        hiddenIdInput.value = productId;
    }
</script>
