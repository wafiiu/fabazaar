<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg mb-3 text-center">Edit a category</h1>

                    <div class="w-full sm:max-w-lg mt-6 mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        {{-- Process of PATCH data to CategoryController@update --}}
                        <form method="POST" action="{{ route('admincategory.update', $category->id) }}">

                            {{-- PATCH means updating data, modern way of POST but updates only --}}
                            @method('PATCH')
                            {{-- Laravel's Cross-Site Request Forgery protection, wajib to use --}}
                            @csrf

                            {{-- Edit Category Name --}}
                            <div class="mt-4">
                                <x-label for="cat_name" :value="__('Category Name')" />

                                <x-input id="cat_name" class="block mt-1 w-full" type="text" name="cat_name"
                                    value="{{ $category->cat_name }}" required />
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
