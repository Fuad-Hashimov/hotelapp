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
        @if (Session::has('success'))
            <div>
                <p class="text-blue-500 text-center text-6xl italic">{{ Session::get('success') }}
                </p>

            </div>
        @endif
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Room Control Page</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-2/4  mx-auto mt-6 pl-0 lg:pl-2">
                    <p class="text-xl pb-6 flex items-center">
                        <i class="fas fa-list mr-3"></i> Hotel Create Form
                    </p>
                    <div class="leading-loose">
                        <form action="" method="POST" enctype="multipart/form-data"
                            class="p-10 bg-white rounded shadow-xl">
                            @csrf
                            <p class="text-lg text-gray-800 font-medium pb-4">Create New Hotel</p>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Name</label>
                                <input value="{{old('name')}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="text" placeholder="Hotel Name">
                                @error('name')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">City</label>
                                <input value="{{old('city')}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="city"
                                    name="city" type="text" placeholder="City">
                                @error('city')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Country</label>
                                <input value="{{old('country')}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="country"
                                    name="country" type="text" placeholder="Country">
                                @error('country')
                                    <p class="text-red-500 text-lg italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Hotel Image</label>
                                <input value="{{old('image')}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="image"
                                    name="image" type="file">
                                @error('image')
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
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->room_number}}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->description}}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $room->hotel->name }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{$room->room_type }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{$room->price }}</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="{{route('admin.room.edit',$room->id)}}">Edit</a></td>
                                    <td class="text-left py-3 px-4">
                                        <form action=""
                                            method="post">
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
