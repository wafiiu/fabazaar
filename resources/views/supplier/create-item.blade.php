<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg mb-3 text-center">What item do you want to sell?</h1>

                    <div class="w-full sm:max-w-lg mt-6 mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        {{-- Process of POST data to ItemController@store starts here --}}
                        <form method="POST" action="{{ route('inventory.store') }}">

                            {{-- Laravel's Cross-Site Request Forgery protection, necessary to use --}}
                            @csrf

                            {{-- New Item Name --}}
                            <div class="mt-4">
                                <x-label for="item_name" :value="__('Item Name')" />

                                <x-input id="item_name" class="block mt-1 w-full" type="text" name="item_name" required />
                            </div>

                            {{-- Your Price. In the future, please put your currency (RM) next to the input --}}
                            <div class="mt-4">
                                <x-label for="item_price" :value="__('Item Price')" />

                                <x-input id="item_price" class="block mt-1 w-full" type="number" step="0.01" name="item_price" required />
                            </div>

                            {{-- How many items you want --}}
                            <div class="mt-4">
                                <x-label for="item_available_unit" :value="__('Item Amount')" />

                                <x-input id="item_available_unit" class="block mt-1 w-full" type="text"
                                    name="item_available_unit" required />
                            </div>

                            {{-- Choose a category --}}
                            @if ($categories->isEmpty()) {{-- in case if admin forgot to add categories --}}
                                <div class="mt-4">
                                    <x-label for="catID" value="{{ __('Category:') }}"/>
                                    <p class="text-sm text-red-500">Looks like you didn't add any categories yet </p>
                                    <select name="catID" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="null" disabled>-- No category available --</option>
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">

                                    <x-button-disable class="m-4">
                                        {{ __('Submit') }}
                                    </x-button-disable>
                                </div>
                            @else
                                <div class="mt-4">
                                    <x-label for="catID" value="{{ __('Category:') }}"/>
                                    <select name="catID" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        {{-- $categories were declared from ItemController@create --}}
                                        @if ($categories->isEmpty())
                                            <option value="null" disabled>-- No category available --</option>
                                        @else
                                            @foreach ($categories as $count => $category)
                                                {{-- for loop the categories in a single category --}}
                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                {{-- we want value of catID only, the cat_name is for easy to read --}}
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">

                                    <x-button class="m-4">
                                        {{ __('Submit') }}
                                    </x-button>
                                </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
