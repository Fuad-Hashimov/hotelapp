@include('layout.header')

<div class=" container mx-auto w-4/5">
    <h1>Edit page</h1>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <form action="{{ route('customer_update', $customer->id) }}" method="POST" class=" w-2/5  mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
            <input type="text" value="{{ $customer->name }}" name="name" id="text"
                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">lastname</label>
            <input type="text" value="{{ $customer->lastname }}" name="lastname" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">sale</label>
            <input type="text" value="{{ $customer->sales }}" name="sales" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
            <input type="text" value="{{ $customer->address->city }}" name="city" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>
            <input type="text" value="{{ $customer->address->country }}" name="country" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        {{-- @foreach ($customer->works as $item)
            <div class="mb-5">
                <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                    <label class="inline-flex items-center">
                        <input checked type="checkbox" name="works[]" value="{{ $item->work }}" class="form-checkbox">
                        <span class="ml-2">{{ $item->work }}</span>
                    </label>
                </div>

            </div>
        @endforeach --}}
        <div class="mb-5">
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input  {{ $customer->works->contains('work', 'Frontend') ? 'checked' : '' }} type="checkbox" name="works[]" value="Frontend" class="form-checkbox">
                    <span class="ml-2">Frontend</span>
                </label>
            </div>
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input  {{ $customer->works->contains('work', 'Backend') ? 'checked' : '' }}  type="checkbox" name="works[]" value="Backend" class="form-checkbox">
                    <span class="ml-2">Backend</span>
                </label>
            </div>
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input  {{ $customer->works->contains('work', 'FullStack') ? 'checked' : '' }} type="checkbox" name="works[]" value="FullStack" class="form-checkbox">
                    <span class="ml-2">FullStack</span>
                </label>
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    </form>


</div>




</body>

</html>
