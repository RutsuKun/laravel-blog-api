<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create post') }}</h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form method="post" action="{{ route('posts.store') }}">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}"/>
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"
                                         :value="old('title')" autofocus autocomplete="off"/>
                            <x-jet-input-error for="title"/>
                        </div>

                        <div class="mt-2">
                            <x-jet-label for="content" value="{{ __('Content') }}"/>

                            <textarea id="content" name="content" rows="6"
                                      class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('content') }}</textarea>

                            <x-jet-input-error for="content"/>
                        </div>
                    </div>


                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-jet-button class="bg-green-500 hover:bg-green-700 text-white font-bold">Create</x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
