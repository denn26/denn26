<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="sm:px-6 lg:px-8">
        @include('navigation-menu')

        <div class="mx-auto max-w-7xl">
            <div class="p-6 overflow-hidden bg-white shadow-lg rounded-box">
                @livewire('carousel-berita')
                @livewire('dashboard')
            </div>
        </div>
    </div>
</x-app-layout>
