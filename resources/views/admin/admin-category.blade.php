<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- When deleting, editing or adding, this message will appear, from CategoryController --}}
                    @if(session()->get('success'))
                        <div class="bg-green-100 p-4 mb-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    {{-- Exceptions handling --}}
                    @if ($errors->any())
                    <div class="bg-red-100 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Category table --}}
                    <h1 class="font-bold text-lg mb-3">List of categories:</h1>
                    <p>Note: Do NOT delete categories that have items related to it.</p>
                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-blue-200">
                                <th class="w-1/6 border-2 border-blue-500">Category ID</th>
                                <th class="w-4/6 border-2 border-blue-500">Category Name</th>
                                <th class="w-1/6 border-2 border-blue-500">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Get some data of $category, which has been declared from CategoryContoller@index --}}
                            @foreach($categories as $count => $category)
                            <tr class="text-center">
                                <td class="border-2 border-blue-500">{{$category->id}}</td>
                                <td class="border-2 border-blue-500 text-left pl-3">{{$category->cat_name}}</td>
                                <td class="border-2 border-blue-500 flex items-center justify-center">
                                    {{-- To edit items, go here --}}
                                    <a href="{{ route('admincategory.edit', $category->id) }}">
                                        <x-button class="m-1">
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>
                                    {{-- To delete items, go here --}}
                                    <form method="POST" action="{{ route('admincategory.destroy', $category->id) }}">
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
                    {{-- Added "ADD" button, because there's no navigation link for adding category --}}
                    <div class="flex items-center justify-center bg-gray-100">
                        <a href="/admincategory/create">
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
