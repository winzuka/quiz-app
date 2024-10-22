<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                    <a href="{{route('questionPage')}}" type="button" class="btn-style">Add Questions</a>
            </div>
        </div>
    </div>
</x-app-layout>
