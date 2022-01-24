<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- When deleting, editing or adding, this message will appear, from ItemController --}}
                    @if(session()->get('success'))
                        <div class="bg-green-100 p-4 mb-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    {{-- Item table --}}
                    <h1 class="font-bold text-lg mb-3">List of items in your inventory:</h1>
                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-green-200">
                                <th class="w-1/12 border-2 border-green-500">No.</th>
                                <th class="w-5/12 border-2 border-green-500">Product Name</th>
                                <th class="w-2/12 border-2 border-green-500">Category</th>
                                <th class="w-2/12 border-2 border-green-500">Price</th>
                                <th class="w-1/12 border-2 border-green-500">Quantity</th>
                                <th class="w-1/6  border-2 border-green-500">Customize</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $items, which has been declared from ItemContoller@index --}}
                            @foreach($items as $count => $item)
                            <tr class="text-center">
                                <td class="border-2 border-green-500">{{ ++$count }}</td>
                                <td class="border-2 border-green-500 text-left pl-3">{{$item->item_name}}</td>
                                <td class="border-2 border-green-500">{{$item->category->cat_name}}</td>
                                <td class="border-2 border-green-500">RM @convert($item->item_price)</td>
                                <td class="border-2 border-green-500">{{$item->item_available_unit}}</td>
                                <td class="border-2 border-green-500 flex items-center justify-center">
                                    {{-- To edit items, go here --}}
                                    <a href="{{ route('inventory.edit', $item->id) }}">
                                        <x-button class="m-1">
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>
                                    {{-- To delete items, go here --}}
                                    <form method="POST" action="{{ route('inventory.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-button-del class="m-1">
                                            {{ __('Delete') }}
                                        </x-button-del>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Added "ADD" button, just for accessibility  --}}
                    <div class="flex items-center justify-center bg-gray-100">
                        <a href="/inventory/create">
                            <x-button class="m-4">
                                {{ __('Add') }}
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
