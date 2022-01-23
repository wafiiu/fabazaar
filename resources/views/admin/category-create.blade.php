<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg mb-3 text-center">Add a category.</h1>

                    <div class="w-full sm:max-w-lg mt-6 mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        {{-- Process of POST data to CategoryController@store --}}
                        <form method="POST" action="{{ route('admincategory.store') }}">

                            {{-- Laravel's Cross-Site Request Forgery protection, wajib to use --}}
                            @csrf

                            {{-- New Category Name --}}
                            <div class="mt-4">
                                <x-label for="cat_name" :value="__('Category Name')" />

                                <x-input id="cat_name" class="block mt-1 w-full" type="text" name="cat_name" required />
                            </div>
                                <x-button class="m-4 ">
                                    {{ __('Submit') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
