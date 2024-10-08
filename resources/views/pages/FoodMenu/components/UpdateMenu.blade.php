{{-- Dialog To Update Menu --}}
<dialog id="updatemenu" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <form action="/menu" id="formupdatemenu" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <h3 class="text-lg font-bold">Update Menu</h3>
            <div class="mb-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Food Name</span>
                    </div>
                    <input type="text" name="foodid" id="updatefoodid" class="input input-bordered w-full"
                        maxlength="50" hidden required />
                    <input type="text" placeholder="Food Name" name="foodname" id="updatefoodname"
                        class="input input-bordered w-full" maxlength="50" required />
                </label>
            </div>
            <div class="mb-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Category</span>
                    </div>
                    <select class="select select-bordered" id="updatefoodcategory" name="foodcategory">
                        <option disabled selected>Pick a category</option>
                        @foreach ($menucategory as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->category_name }} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Description</span>
                    </div>
                    <textarea class="textarea textarea-bordered h-24" id="updatefooddescription" name="fooddescription"
                        placeholder="Food Description"></textarea>
                </label>
            </div>
            <div class="mb-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Price</span>
                    </div>
                    <input type="number" placeholder="Food Price" name="foodprice" id="updatefoodprice"
                        class="input input-bordered w-full" maxlength="10" required />
                </label>
            </div>
            <div class="mb-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Food Image (not required)</span>
                    </div>
                    <input type="file" name="foodimage" id="foodimage"
                        class="file-input file-input-bordered w-full max-w-xs" accept="image/*" />
                </label>
            </div>
            <div class="modal-action">
                <button type="submit"
                    class="py-2 px-4 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">Update
                    Menu</button>
        </form>
        <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
        </form>
    </div>
</dialog>
