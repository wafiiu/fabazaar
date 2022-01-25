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

                            @include('customer.search', ['categories', 'currentcategory'])
                        </form>
                    </div>


                    <table class="w-full table-fixed border-collapse mt-5">
                        <thead>
                            <tr class="bg-blue-200">
                                <th class="w-1/12 border-2 border-purple-500">No.</th>
                                <th class="w-5/12 border-2 border-purple-500">Product Name</th>
                                <th class="w-2/12 border-2 border-purple-500">Category</th>
                                <th class="w-2/12 border-2 border-purple-500">Price</th>
                                <th class="w-1/12 border-2 border-purple-500">Avail. Unit</th>
                                <th class="w-1/6  border-2 border-purple-500">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $items, which has been declared from MarketContoller@index --}}
                            @foreach($items as $count => $item)
                            <tr class="text-center">
                                <td class="border-2 border-purple-500">{{ ++$count }}</td>
                                <td class="border-2 border-purple-500 text-left pl-3">{{$item->item_name}}</td>
                                <td class="border-2 border-purple-500">{{$item->category->cat_name}}</td>
                                <td class="border-2 border-purple-500">RM @convert($item->item_price)</td>
                                <td class="border-2 border-purple-500">{{$item->item_available_unit}}</td>
                                <td class="border-2 border-purple-500 flex item-center justify-center">
                                    {{-- To delete items, go here --}}
                                    <form method="POST" action="{{ route('orders.store') }}">
                                        @csrf

                                        {{-- Default Value, is able to edit later on except purchase date --}}
                                        <input type='hidden' name='itemID' value='{{ $item->id }}' />
                                        <x-button class="m-1">
                                            {{ __('Buy') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- idk pls return thanks --}}
                    <div class="flex items-center justify-center bg-gray-100">
                        <form method="POST" action="{{ route('category.show') }}">
                            @csrf

                            <input type='hidden' name='catID' value='1' />
                            <input type='hidden' name='searchBy' value='shop' />
                            <x-button class="m-4">
                                {{ __('Return') }}
                            </x-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
