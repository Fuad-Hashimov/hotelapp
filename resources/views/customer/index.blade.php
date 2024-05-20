@include('layout.header')

<div class=" md:container  mx-auto  w-4/5">
    <a href="{{ route('customer_create') }}" class="bg-sky-600   text-stone-700">Create Page</a>
    <table class="w-4/5 mt-5  mx-auto bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                {{-- <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Images</th> --}}
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sales</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">City</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Country</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Works</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Update</td>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Delete</td>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @if (Session::has('success'))
                <p>{{Session::get('success')}}</p>
            @endif
            @foreach ($customers as $item)
                <tr>
                    {{-- <td class="w-1/3 text-left py-3 px-4">

                    </td> --}}
                    <td class="w-1/3 text-left py-3 px-4">{{ $item->name }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $item->lastname }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $item->sales }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $item->address->city }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $item->address->country }}</td>
                    <td class="w-1/3 text-left py-3 px-4">
                        <ul>

                    @foreach ($item->works as $work)

                            <li>{{$work->work}}</li>

                    @endforeach

                </ul>
                </td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                            href="{{ route('customer_edit', $item->id) }}">Update</a></td>
                    <td class="text-left py-3 px-4">
                        <form method="POST" action="{{ route('customer_destroy', $item->id) }}">
                            @csrf
                            @method("delete")
                            <button class="hover:text-blue-500" type="submit">Delete</button>
                        </form>
                        {{-- <a  href="{{ route('customer_destroy', $item->id) }}">Delete</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}
</div>

</body>

</html>
