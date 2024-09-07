<x-layout>
    <div
        class="container bg-white mx-auto m-4 flex flex-col items-center justify-start p-4 rounded-lg shadow-lg lg:w-1/2">
        <div class="card-title">
            <h1>Account Information</h1>
        </div>
        <div class="divider"></div>
        <div class="avatar static my-4">
            <div class="w-24 h-24 rounded-full overflow-hidden">
                <img src="/images/user.png" class="w-full h-full object-cover" />
            </div>
        </div>
        <div class="w-full">
            @include('components.message')
            <form action="/account" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">E-Mail</span>
                        </div>
                        <input type="text" placeholder="Type here" name="email" value="{{ $user->email }}"
                            class="input input-bordered w-full bg-gray-300" maxlength="100" readonly required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input type="text" placeholder="Type here" name="name" value="{{ $user->name }}"
                            class="input input-bordered w-full" maxlength="50" required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Address</span>
                        </div>
                        <input type="text" placeholder="Type here" name="address" value="{{ $user->address }}"
                            class="input input-bordered w-full" maxlength="50" required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Contact</span>
                        </div>
                        <input type="text" placeholder="Type here" name="contact" value="{{ $user->contact }}"
                            class="input input-bordered w-full" maxlength="13" required />
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea name="description" class="input input-bordered w-full h-auto" maxlength="255" rows="10" required>{{ $user->description }}</textarea>
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Change Password</span>
                        </div>
                        <button type="button" onclick="changepassword.showModal()"
                            class="py-2 px-4 bg-gray-700 text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300">
                            Click to Change Password
                        </button>
                    </label>
                </div>
                <div class="w-full flex flex-grow">
                    <button type="submit"
                        class="py-2 px-4 w-full bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save Changes
                    </button>
                </div>
            </form>
            <dialog id="changepassword" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form action="/account/changepassword" method="POST">
                        @csrf
                        @method('PUT')
                        <h3 class="text-lg font-bold">Change Password</h3>
                        <div class="mb-3">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">New Password</span>
                                </div>
                                <input type="password" placeholder="********" name="password" id="newpassword"
                                    class="input input-bordered w-full" maxlength="50" required />
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Confirm Password</span>
                                </div>
                                <input type="password" placeholder="********" name="password_confirmation"
                                    id="" class="input input-bordered w-full" maxlength="50" required />
                            </label>
                        </div>
                        <div class="modal-action">
                            <button type="submit"
                                class="py-2 px-4 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">Change
                                Password</button>
                    </form>
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
        </div>
        </dialog>
    </div>
    </div>
</x-layout>
