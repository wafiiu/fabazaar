<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Orders') }}
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
                    @if(session()->get('failed'))
                        <div class="bg-red-100 p-4 mb-4">
                            {{ session()->get('failed') }}
                        </div>
                    @endif

                    {{-- Purchase table, almost same as item table --}}
                    <h1 class="font-bold text-lg mb-3">List of orders that you made:</h1>
                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-green-200">
                                <th class="w-1/12 border-2 border-green-500">No.</th>
                                <th class="w-5/12 border-2 border-green-500">Product Name</th>
                                <th class="w-2/12 border-2 border-green-500">Price</th>
                                <th class="w-2/12 border-2 border-green-500">Date Purchased</th>
                                <th class="w-1/12 border-2 border-green-500">Quantity</th>
                                <th class="w-1/6  border-2 border-green-500">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $purchases, which has been declared from PurchaseContoller@index --}}
                            @php
                                $total_price = 0.0;
                            @endphp
                            @foreach($purchases as $count => $purchase)
                            <tr class="text-center">
                                <td class="border-2 border-green-500">{{ ++$count }}</td>
                                <td class="border-2 border-green-500 text-left pl-3">{{ $purchase->item->item_name }}</td>
                                <td class="border-2 border-green-500">RM @convert($purchase->item->item_price)</td>
                                <td class="border-2 border-green-500">{{ $purchase->purchase_date}}</td>
                                <td class="border-2 border-green-500">{{ $purchase->quantity }}</td>
                                @php
                                    $total_price += $purchase->item->item_price * $purchase->quantity;
                                @endphp
                                <td class="border-2 border-green-500 flex items-center justify-center">
                                    {{-- To edit items, go here --}}
                                    <a href="{{ route('orders.edit', $purchase->id) }}">
                                        <x-button class="m-1">
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>
                                    {{-- To delete items, go here --}}
                                        <form method="POST" action="{{ route('orders.destroy', $purchase->id) }}">
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

                    {{-- {{ $todaydate = Carbon\Carbon::now()->toDateString() }} purchase date debug  --}}
                    {{-- Added "BUY SOMETHING" button, because ya know, you had to buy something. duh --}}
                    <div class="flex items-center justify-center bg-gray-100">
                        <a href="/orders/create">
                            <x-button class="m-4">
                                {{ __('Buy Something') }}
                            </x-button>
                        </a>
                        <h1 class="text-bold text-2xl justify-self-end">Total price: RM @convert($total_price)</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
