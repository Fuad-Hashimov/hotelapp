@include('admin.admin_layout.header')


<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2"></div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen"
                class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
            </div>
        </div>
    </header>


    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">

        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Forms</h1>
            <div class="flex flex-wrap">
                <div class="w-full mx-auto lg:w-1/2 my-6 pr-0 lg:pr-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-list mr-3"></i> Update Form
                    </p>
                    <div class="leading-loose">
                        @if (Session::has('success'))
                            <div>
                                <p class="text-blue-500 text-center text-6xl italic">{{ Session::get('success') }}
                                </p>
                            </div>
                        @endif
                        <form action="" method="POST" enctype="multipart/form-data"
                            class="p-10 bg-white rounded shadow-xl">
                            @csrf
                            @method('PUT')

                            <p class="text-lg text-gray-800 font-medium pb-4">Update Hotel</p>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Hotel Name</label>
                                <select name="hotel_id" id="hotel_id" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                                    @foreach ($hotel_names as $hotel)
                                        <option value="{{ $hotel->id }}" {{ $room->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                                    @endforeach
                                </select>

                                @error('room_number')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Room_Number</label>
                                <input value="{{ $room->room_number }}"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="room_number" type="text" placeholder="room_number">
                                @error('room_number')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Description</label>
                                <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"   name="description" id="description" cols="30" rows="5">{{$room->description}} </textarea>
                                @error('description')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Price</label>
                                <input value="{{ $room->price }}"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="country"
                                    name="country" type="text" placeholder="Price">
                                @error('price')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm text-gray-600" for="room_type">Room Type</label>
                                <select name="room_type" id="room_type"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                                    @foreach ($room_types as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $room->room_type == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="">
                                <label class="block text-sm text-gray-600" for="image">Hotel Image</label>
                                <img src=" " class="w-16 h-16 object-cover mb-4" alt="Current Image">
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="image"
                                    name="image" type="file">

                                @error('image')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="mt-6">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </main>

        <footer class="w-full bg-white text-right p-4">
            Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer>
    </div>

</div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>
