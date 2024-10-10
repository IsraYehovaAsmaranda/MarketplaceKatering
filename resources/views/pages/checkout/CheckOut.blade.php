<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 min-h-screen">
        <!-- Form Checkout -->
        <div class="bg-white md:col-span-2 w-full p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4">Checkout</h2>
            <form action="/checkout" method="POST">
                @csrf

                <!-- Payment Method -->
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Payment Method</span>
                        </div>
                        <select class="select select-bordered" id="paymentmethod" name="paymentmethod">
                            <option disabled selected>Pick a payment method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="ewallet">E-Wallet</option>
                            <option value="cod">Cash on Delivery (COD)</option>
                        </select>
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Arrival Date</span>
                        </div>
                        <input type="date" name="arrivaldate" id="arrivaldate" class="input input-bordered w-full"
                            required />
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Company Name</span>
                        </div>
                        <input type="text" maxlength="50" name="companyname" id="companyname" class="input input-bordered w-full"
                            required />
                    </label>
                </div>

                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Address</span>
                        </div>
                        <input type="text" maxlength="100" name="address" id="address" class="input input-bordered w-full"
                            required />
                    </label>
                </div>

                <div>
                    <button type="submit"
                        class="btn m-1 bg-green-700 w-full text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Checkout
                    </button>
                </div>
            </form>
        </div>

        <!-- Items Being Checked Out -->
        <div class="bg-white w-full p-6 rounded-lg shadow-lg text-black">
            <h2 class="text-xl font-bold mb-4">Checked out item</h2>
            <div class="mb-4 flex items-center">
                <div class="w-24 h-24 mr-4">
                    <img src="{{ Storage::url($foodData->image_url) }}" alt="{{ $foodData->food_name }}"
                        class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $cartQty }} {{ $foodData->food_name }} </h3>
                    <p>Harga: Rp {{ number_format($foodData->price * $cartQty, 0, ',', '.') }}</p>
                    <p>Merchant: {{ $foodData->merchant->name }} </p>
                </div>
            </div>
            <hr class="border-t border-gray-300 my-4">
            <h3 class="text-l font-bold mb-4">Total Price: Rp {{ number_format($foodData->price * $cartQty, 0, ',', '.') }} </h3>
        </div>
    </div>
</x-layout>
