<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <h1 class="font-bold text-xl">Hello Customer, {{ Auth::user()->name }}!</h1>
                    You're logged in as a Customer!
                    <br>
                    <br>
                    <h1 class="font-bold text-xl">Your details:</h1>
                    <strong>Your ID number is: </strong> {{ Auth::id() }} <br>
                    <strong>Your email address is: </strong> {{ Auth::user()->email }} <br>
                    <strong>Your phone number is: </strong> {{ Auth::user()->phone_no }} <br>
                    <strong>Your address is: </strong> {{ Auth::user()->address }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
