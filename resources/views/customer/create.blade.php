@include('layout.header')

<div class=" container mx-auto w-4/5">
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    @if (Session::has('success'))
        <div>
            <span>{{ Session::get('success') }}</span>
        </div>
    @endif
    <form action="{{ route('customer_store') }}" method="POST" enctype="multipart/form-data" class=" w-2/5  mx-auto">
        @csrf
        <h1>Create Page</h1>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
            <input value="{{ old('name') }}" type="text" name="name" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">lastname</label>
            <input value="{{ old('lastname') }}" type="text" name="lastname" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">sale</label>
            <input value="{{ old('sales') }}" type="text" name="sales" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
            <input value="{{ old('city') }}" type="text" name="city" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>
            <input value="{{ old('country') }}" type="text" name="country" id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <div class="mb-5">
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="works[]" value="Frontend" class="form-checkbox">
                    <span class="ml-2">Frontend</span>
                </label>
            </div>
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="works[]" value="Backend" class="form-checkbox">
                    <span class="ml-2">Backend</span>
                </label>
            </div>
            <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="works[]" value="FullStack" class="form-checkbox">
                    <span class="ml-2">FullStack</span>
                </label>
            </div>
        </div>
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>
            <input multiple type="file" name="images[]" accept="image/*" multiple id="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=" " />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    </form>


</div>




</body>

</html>
