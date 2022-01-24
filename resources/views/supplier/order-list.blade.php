<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer\'s Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- When deleting, editing or adding, this message will appear, from PurchaseController --}}
                    @if(session()->get('success'))
                        <div class="bg-green-100 p-4 mb-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    {{-- Purchase table, almost same as item table --}}
                    <h1 class="font-bold text-lg mb-3">List of customer's orders:</h1>
                    {{-- {{ $purchases }}
                    {{ $items }} --}}
                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-pink-200">
                                <th class="w-1/12 border-2 border-pink-500">No.</th>
                                <th class="w-3/12 border-2 border-pink-500">Product Name</th>
                                <th class="w-2/12 border-2 border-pink-500">Price</th>
                                <th class="w-2/12 border-2 border-pink-500">Date Purchased</th>
                                <th class="w-1/12 border-2 border-pink-500">Quantity</th>
                                <th class="w-3/12 border-2 border-pink-500">Customer's Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $purchases, which has been declared from OrderController@index --}}
                            @foreach($purchases as $count => $purchase)
                                @foreach ($items as $x => $item)
                                    @if ($purchase->itemID == $item->id)
                                        <tr class="text-center">
                                            <td class="border-2 border-pink-500">{{ ++$count }}</td>
                                            <td class="border-2 border-pink-500 text-left pl-3">{{ $purchase->item->item_name }}</td>
                                            <td class="border-2 border-pink-500">RM @convert($purchase->item->item_price)</td>
                                            <td class="border-2 border-pink-500">{{ $purchase->purchase_date}}</td>
                                            <td class="border-2 border-pink-500">{{ $purchase->quantity }}</td>
                                            <td class="border-2 border-pink-500">{{ $purchase->customer->name }}<br>{{ $purchase->customer->address }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Added "RETURN" button, for accessibility  --}}
                    <div class="flex items-center justify-center bg-gray-100">
                        <a href="/inventory">
                            <x-button class="m-4">
                                {{ __('Return') }}
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
