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

                    <div class="m-4">
                        <form method="POST" action="{{ route('category.show') }}">

                            @csrf

                            @include('customer.search', ['categories', 'searchwith'])
                        </form>
                    </div>

                    <table class="w-full table-fixed border-collapse mt-5">
                        <thead>
                            <tr class="bg-red-200">
                                <th class="w-1/6 border-2 border-purple-500">No.</th>
                                <th class="w-5/6 border-2 border-purple-500">Seller's Name</th>
                                <th class="w-1/6 border-2 border-purple-500">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $items, which has been declared from MarketContoller@index --}}
                            @foreach($sellers as $count => $seller)
                            <tr class="text-center">
                                <td class="border-2 border-purple-500">{{ ++$count }}</td>
                                <td class="border-2 border-purple-500 text-left pl-3">{{$seller->name}}</td>
                                <td class="border-2 border-purple-500 flex item-center justify-center">
                                    {{-- To delete items, go here --}}
                                    <form method="POST" action="{{ route('category.store') }}">
                                        @csrf

                                        <input type='hidden' name='suppID' value='{{ $seller->id }}' />
                                        <x-button class="m-1">
                                            {{ __('Visit') }}
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
