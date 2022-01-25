<div class="grid grid-cols-11 gaps-5">
    <div class="col-span-2 mr-4">
        <x-label for="searchBy" value="{{ __('Search By:') }}"/>
        <select name="searchBy" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            @if ($searchwith == 'category')
                <option value="category">Category</option>
                <option value="shop">Seller</option>
            @else
                <option value="shop">Seller</option>
                <option value="category">Category</option>
            @endif
        </select>
    </div>
    @if ($searchwith == 'category')
        <div class="col-span-2">
            <x-label for="catID" value="{{ __('Select Category:') }}"/>
            <select name="catID" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="{{ $currentcategory->id }}">{{ $currentcategory->cat_name }}</option>
                @foreach ($categories as $count => $category)
                    @if ($category->id != $currentcategory->id)
                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    @else
        <input type='hidden' name='catID' value='1' />
    @endif
    <x-button class="ml-4 mt-6">
        {{ __('Show') }}
    </x-button>
</div>
