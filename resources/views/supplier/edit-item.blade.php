<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg mb-3 text-center">What item do you want to sell?</h1>

                    <div class="w-full sm:max-w-lg mt-6 mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        {{-- Process of PATCH data to ItemController@update --}}
                        <form method="POST" action="{{ route('inventory.update', $item->id) }}">

                            {{-- PATCH means updating data, modern way of POST but updates only --}}
                            @method('PATCH')
                            {{-- Laravel's Cross-Site Request Forgery protection, necessary use --}}
                            @csrf

                            {{-- Edit Item Name --}}
                            <div class="mt-4">
                                <x-label for="item_name" :value="__('Item Name')" />

                                <x-input id="item_name" class="block mt-1 w-full" type="text" name="item_name"
                                    value="{{ $item->item_name }}" required />
                            </div>

                            {{-- Edit Item Price --}}
                            <div class="mt-4">
                                <x-label for="item_price" :value="__('Item Price')" />

                                <x-input id="item_price" class="block mt-1 w-full" type="number" step="0.01" name="item_price"
                                    value="{{ $item->item_price }}" required />
                            </div>

                            {{-- Edit Item Available Unit --}}
                            <div class="mt-4">
                                <x-label for="item_available_unit" :value="__('Item Amount')" />

                                <x-input id="item_available_unit" class="block mt-1 w-full" type="text"
                                    name="item_available_unit" value="{{ $item->item_available_unit }}" required />
                            </div>

                            {{-- Edit Category --}}
                            <div class="mt-4">
                                <x-label for="catID" value="{{ __('Category:') }}"/>
                                <select name="catID" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="{{ $item->category->id }}">{{ $item->category->cat_name }}</option> {{-- unchanged option --}}
                                    @foreach ($categories as $count => $category)
                                        @if ($category->cat_name != $item->category->cat_name) {{-- to avoid looping problems --}}
                                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option> {{-- to select other options --}}
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-4">

                                <x-button class="m-4 ">
                                    {{ __('Apply') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
