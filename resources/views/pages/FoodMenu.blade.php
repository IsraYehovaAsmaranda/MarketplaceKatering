<x-layout>
    <div
        class="container bg-white mx-auto m-4 flex flex-col items-center justify-start p-4 rounded-lg shadow-lg min-h-screen">
        <div class="card-title">
            <h1>Your Menu</h1>
        </div>
        <div class="divider"></div>
        <div class="w-full">
            @include('components.message')
            <div class="mb-3">
                <button
                    class="btn m-1 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="addmenu.showModal()">Add
                    Menu</button>
            </div>
            <div class="overflow-x-auto">
                <table class="table min-w-full">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($foodmenus as $foodMenu)
                            <tr class="hover">
                                <th> {{ $no++ }} </th>
                                <td>{{ $foodMenu->food_name }}</td>
                                <td>
                                    <div class="flex items-start justify-start h-32 w-full">
                                        <img src="{{ $foodMenu->image_url }}" class="object-contain h-full w-full"
                                            alt="Food Image">
                                    </div>
                                </td>
                                <td>{{ $foodMenu->category->category_name }}</td>
                                <td>{{ $foodMenu->description }}</td>
                                <td>{{ $foodMenu->price }}</td>
                                <td>
                                    <button
                                        class="btn m-1 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        Disable
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Dialog To Change Password --}}
    <dialog id="addmenu" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <form action="/menu" method="POST">
                @csrf
                <h3 class="text-lg font-bold">Add Menu</h3>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Food Name</span>
                        </div>
                        <input type="text" placeholder="Food Name" name="name" id="name"
                            class="input input-bordered w-full" maxlength="50" required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Category</span>
                        </div>
                        <select class="select select-bordered" id="category" name="category">
                            <option disabled selected>Pick a category</option>
                            <option>Cat 1</option>
                            <option>Cat 1</option>
                            <option>Cat 1</option>
                            <option>Cat 1</option>
                            <option>Cat 1</option>
                          </select>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea class="textarea textarea-bordered h-24" id="description" name="description" placeholder="Food Description"></textarea>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Price</span>
                        </div>
                        <input type="number" placeholder="Food Price" name="price"
                            id="price" class="input input-bordered w-full" maxlength="10" required  />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Food Image</span>
                        </div>
                        <input type="file" name="image"
                            id="image" class="file-input file-input-bordered w-full max-w-xs" accept="image/*" required />
                    </label>
                </div>
                <div class="modal-action">
                    <button type="submit"
                        class="py-2 px-4 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">Add Menu</button>
            </form>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </dialog>
</x-layout>
