<x-layout>
    <div
        class="container bg-white mx-auto m-4 flex flex-col items-center justify-start p-4 rounded-lg shadow-lg min-h-screen lg:w-1/2">
        <div class="card-title">
            <h1>Your Cart</h1>
        </div>
        <div class="divider"></div>
        <div class="w-full">
            @include('components.message')
            <form action="/cart" method="POST">
                @csrf
                @method('PUT')

                @foreach ($carts as $cart)
                    <div class="mb-3 w-full">
                        <div class="grid grid-cols-5">
                            <div class="form-control col-span-1">
                                <label class="label cursor-pointer">
                                    <input type="checkbox" checked="checked" id="checkCart{{ $cart->id }}"
                                        name="checkCart[]" class="checkbox" value="{{ $cart->id }}" />
                                </label>
                            </div>
                            <div class="form-control col-span-2 p-2">
                                <h1> {{ $cart->food->food_name }} </h1>
                            </div>
                            <div class="form-control col-span-1">
                                <input type="number" placeholder="Qty" name="qty" id="qty{{ $cart->id }}"
                                    name="qty[]" class="input input-bordered w-full" maxlength="3"
                                    value="{{ $cart->qty }}" required />
                            </div>
                            <div class="form-control col-span-1 p-2">
                                <button type="button" class="text-red-500"
                                    onclick="updateCartModal(this); itemmodal.showModal()"
                                    data-cartid="{{ $cart->id }}" data-itemname="{{ $cart->food->food_name }}"><i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="w-full flex flex-grow">
                    @if (!$carts->isEmpty())
                        <button type="submit"
                            class="py-2 px-4 w-full bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Checkout
                        </button>
                    @else
                        <button
                            class="py-2 px-4 w-full bg-gray-700 text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300" disabled>
                            You have no food in your cart
                        </button>
                    @endif

                </div>
            </form>
        </div>
    </div>

    {{-- Dialog For Deleting Item --}}
    <dialog id="itemmodal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="/cart" method="POST">
                @csrf
                @method('delete')

                <h3 id="modal-title" class="text-lg font-bold">Delete Item</h3>
                <div class="mb-3">
                    <p>Are you sure you want to delete <span id="productname">Product Name</span> from your cart?</p>
                </div>
                <input type="text" placeholder="id" name="id" id="id" class="input input-bordered w-full"
                    maxlength="3" readonly hidden required />
                <div class="modal-action">
                    <button type="submit"
                        class="py-2 px-4 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Delete
                        from cart</button>
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
        const productName = button.getAttribute('data-itemname');
        const cartId = button.getAttribute('data-cartid');

        console.log(cartId);

        // Change modal title
        const modalTitle = document.querySelector('#modal-title');
        const productSpan = document.querySelector('#productname');
        productSpan.textContent = productName;
        modalTitle.textContent = `Delete ${productName} from cart`;

        const hiddenIdInput = document.querySelector('#id');
        hiddenIdInput.value = cartId;

        // Update form action with cartId
        const form = document.querySelector('#itemmodal form');
        form.action = `/cart/${cartId}`;
    }
</script>
