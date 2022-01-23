<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-pink-200">
                                @if ($usertype == 'customer')
                                    <th class="w-1/12 border-2 border-pink-500">Order ID</th>
                                    <th class="w-4/12 border-2 border-pink-500">Product Name</th>
                                    <th class="w-3/12 border-2 border-pink-500">Price</th>
                                    <th class="w-3/12 border-2 border-pink-500">Date Purchased</th>
                                @elseif ($usertype == 'supplier')
                                    <th class="w-1/12 border-2 border-pink-500">Item ID</th>
                                    <th class="w-5/12 border-2 border-pink-500">Product Name</th>
                                    <th class="w-2/12 border-2 border-pink-500">Category</th>
                                    <th class="w-2/12 border-2 border-pink-500">Price</th>
                                @endif
                                <th class="w-1/12 border-2 border-pink-500">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $purchases, which has been declared from PurchaseContoller@index --}}
                            @php
                                $total_price = 0.0;
                            @endphp
                            @foreach($details as $count => $detail)
                            <tr class="text-center">
                                <td class="border-2 border-pink-500">{{ $detail->id }}</td>
                                @if ($usertype == 'customer')
                                    <td class="border-2 border-pink-500 text-left pl-3">{{ $detail->item->item_name }}</td>
                                    <td class="border-2 border-pink-500">RM @convert($detail->item->item_price)</td>
                                    <td class="border-2 border-pink-500">{{ $detail->purchase_date}}</td>
                                    <td class="border-2 border-pink-500">{{ $detail->quantity }}</td>
                                @elseif ($usertype == 'supplier')
                                    <td class="border-2 border-pink-500 text-left pl-3">{{ $detail->item_name }}</td>
                                    <td class="border-2 border-pink-500">{{ $detail->category->cat_name }}</td>
                                    <td class="border-2 border-pink-500">RM @convert($detail->item_price)</td>
                                    <td class="border-2 border-pink-500">{{ $detail->item_available_unit }}</td>
                                @endif
                                @php
                                    if ($usertype == 'customer')
                                        $total_price += $detail->item->item_price * $detail->quantity;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($usertype == 'supplier')
                    <h1 class="text-bold text-lg mt-9">Customer's Orders:</h1>
                    <table class="w-full table-fixed border-collapse mt-3">
                        <thead>
                            <tr class="bg-pink-200">
                                <th class="w-1/12 border-2 border-pink-500">Purchase ID</th>
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
                                @foreach ($details as $x => $detail)
                                    @if ($purchase->itemID == $detail->id)
                                        <tr class="text-center">
                                            <td class="border-2 border-pink-500">{{ $purchase->id }}</td>
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
                    @endif


                    <div class="flex items-center justify-center bg-gray-100">
                        <a href="/list{{ $usertype }}s">
                            <x-button class="m-4">
                                {{ __('Return') }}
                            </x-button>
                        </a>
                        @if ($usertype == 'customer')
                            <h1 class="text-bold text-2xl justify-self-end">Total price: RM @convert($total_price)</h1>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
