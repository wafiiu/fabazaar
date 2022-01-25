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


                            @if ($categories->isEmpty())
                                <p class="text-sm text-red-500">No category added yet.</p>
                            @endif
                            @include('customer.search', ['categories'])
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
