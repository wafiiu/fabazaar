<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marketplace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- <div class="m-4"> --}}
                        {{-- <form method="POST" action="{{ route('category.show') }}"> --}}

                            {{-- @csrf --}}

                            {{-- @include('customer.search', ['categories', 'searchwith']) --}}
                        {{-- </form> --}}
                    {{-- </div> --}}

                    <table class="w-full table-fixed border-collapse mt-5">
                        <thead>
                            <tr class="bg-yellow-200">
                                <th class="w-1/12 border-2 border-yellow-500">User ID</th>
                                <th class="w-1/6 border-2 border-yellow-500">Name</th>
                                <th class="w-1/6 border-2 border-yellow-500">Email</th>
                                <th class="w-1/6 border-2 border-yellow-500">Phone Number</th>
                                <th class="w-3/12 border-2 border-yellow-500">Address</th>
                                <th class="w-1/12 border-2 border-yellow-500">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $items, which has been declared from MarketContoller@index --}}
                            @foreach($users as $count => $user)
                            <tr class="text-center">
                                <td class="border-2 border-yellow-500">{{ $user->id }}</td>
                                <td class="border-2 border-yellow-500 text-left pl-3">{{$user->name}}</td>
                                <td class="border-2 border-yellow-500">{{$user->email}}</td>
                                <td class="border-2 border-yellow-500">{{$user->phone_no}}</td>
                                <td class="border-2 border-yellow-500 text-left pl-3">{{$user->address}}</td>
                                <td class="border-2 border-yellow-500 flex item-center justify-center">
                                    {{-- To delete items, go here --}}
                                    <form method="POST" action="{{ route('admin.details') }}">
                                        @csrf
                                        <input name="userType" value="{{ $usertype }}" hidden>
                                        <input name="id" value="{{ $user->id }}" hidden>
                                        <x-button class="m-1">
                                            {{ __('View') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
