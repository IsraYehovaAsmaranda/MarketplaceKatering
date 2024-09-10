<x-layout>
    <div
        class="container bg-white mx-auto m-4 flex flex-col items-center justify-start p-4 rounded-lg shadow-lg lg:w-1/2">
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
                                    <input type="checkbox" checked="checked" class="checkbox"
                                        value="{{ $cart->id }}" />
                                </label>
                            </div>
                            <div class="form-control col-span-2 p-2">
                                <h1> {{ $cart->food->food_name }} </h1>
                            </div>
                            <div class="form-control col-span-1 p-2">
                                <input type="number" placeholder="Qty" name="qty" id="qty"
                                    class="input input-bordered w-full" maxlength="3" value="{{$cart->qty}}" required />
                            </div>
                            <div class="form-control col-span-1 p-2">
                                <button type="button" class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="w-full flex flex-grow">
                    <button type="submit"
                        class="py-2 px-4 w-full bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
