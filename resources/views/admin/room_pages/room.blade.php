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
            <h1 class="w-full text-3xl text-black pb-6">Room Control Page</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-2/4  mx-auto mt-6 pl-0 lg:pl-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-list mr-3"></i> Room Create Form
                    </p>
                    <div class="leading-loose">
                        @if (Session::has('success'))
                            <div>
                                <p class="text-blue-500 text-center text-6xl italic">{{ Session::get('success') }}
                                </p>

                            </div>
                        @endif
                        <form action="{{ route('admin.room.store') }}" method="POST" enctype="multipart/form-data"
                            class="p-10 bg-white rounded shadow-xl">
                            @csrf
                            <p class="text-lg text-gray-800 font-medium pb-4">Update Hotel</p>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Hotel Name</label>
                                <select name="hotelName" id="hotel_id"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                                    @foreach ($hotel_names as $hotel)
                                        <option value="{{ $hotel->name }}">{{ $hotel->name }}</option>
                                    @endforeach
                                </select>

                                @error('hotelName')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Room_Number</label>
                                <input value="{{ old('room_number') }}"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="room_number" type="text" placeholder="room_number">

                                @error('room_number')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Description</label>
                                <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="description" id="description" cols="30"
                                    rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Price</label>
                                <input value="{{ old('price') }}"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="price"
                                    name="price" type="text" placeholder="Price">
                                @error('price')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm text-gray-600" for="room_type">Room Type</label>
                                <select name="room_type" id="room_type"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                                    @foreach ($room_types as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Room Images</label>
                                <input  type="file" id="images" name="images[]"   multiple id="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder=" " />
                                    @error('images')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full mt-6">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Table Example
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Room Number</td>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Hotel Name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Room Type</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</td>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Update</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">

                            @foreach ($rooms as $room)
                                <tr>
                                    {{-- <td class="w-1/3 text-left py-3 px-4">
                                        <img src="" class="w-16 h-16 object-cover" alt="">
                                    </td> --}}
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->room_number }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->description }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->hotel->name }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->room_type }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->price }}</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="{{ route('admin.room.edit', $room->id) }}">Edit</a></td>
                                    <td class="text-left py-3 px-4">
                                        <form action="{{ route('admin.room.delete', $room->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hover:text-blue-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                    {{ $rooms->links() }}
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
