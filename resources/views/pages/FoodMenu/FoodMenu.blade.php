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
                    class="btn m-1 bg-blue-700 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    onclick="addmenu.showModal()">Add
                    Menu</button>
            </div>
            <div class="overflow-x-auto">
                <table class="table min-w-full text-center">
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
                                        <img src="{{ Storage::url($foodMenu->image_url) }}"
                                            class="object-contain h-full w-full" alt="Food Image">
                                    </div>
                                </td>
                                <td>{{ $foodMenu->category->category_name }}</td>
                                <td>{{ $foodMenu->description }}</td>
                                <td>Rp {{ number_format($foodMenu->price, 2) }}</td>
                                <td>
                                    <button
                                        class="btn m-1 bg-yellow-700 text-white rounded-md hover:bg-yellow-800 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                        onclick="updateMenuModal(this);updatemenu.showModal()"
                                        data-foodId="{{ $foodMenu->id }}" data-foodName="{{ $foodMenu->food_name }}"
                                        data-foodCategory="{{ $foodMenu->category_id }}"
                                        data-foodDescription="{{ $foodMenu->description }}"
                                        data-foodPrice="{{ $foodMenu->price }}">
                                        Edit
                                    </button>
                                    <form action="/menu/{{ $foodMenu->id }}/togglestatus" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($foodMenu->status)
                                            <button name="statusto" value="0"
                                                class="btn m-1 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Disable
                                            </button>
                                        @else
                                            <button value="1" name="statusto"
                                                class="btn m-1 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Enable
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('pages.FoodMenu.components.AddMenu')
    @include('pages.FoodMenu.components.UpdateMenu')
</x-layout>

<script>
    function updateMenuModal(button) {
        const foodId = button.getAttribute('data-foodId');
        const foodName = button.getAttribute('data-foodName');
        const foodCategory = button.getAttribute('data-foodCategory');
        const foodDescription = button.getAttribute('data-foodDescription');
        const foodPrice = button.getAttribute('data-foodPrice');

        const formUpdateMenu = document.querySelector('#formupdatemenu')
        const updateFoodIdInput = document.querySelector('#updatefoodid');
        const updateFoodNameInput = document.querySelector('#updatefoodname');
        const updateFoodCategoryInput = document.querySelector('#updatefoodcategory');
        const updateFoodDescriptionInput = document.querySelector('#updatefooddescription');
        const updateFoodPriceInput = document.querySelector('#updatefoodprice');

        formUpdateMenu.action = "/menu/" + foodId;
        updateFoodIdInput.value = foodId;
        updateFoodNameInput.value = foodName;
        updateFoodCategoryInput.value = foodCategory;
        updateFoodDescriptionInput.value = foodDescription;
        updateFoodPriceInput.value = foodPrice;

        console.log(formUpdateMenu);
    }
</script>
