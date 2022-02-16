<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <form method="post" action="{{ route('posts.update', $post->id) }}">
                @csrf
                @method('put')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}"/>
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"
                                         :value="old('title', $post->title)" autofocus autocomplete="off"/>
                            <x-jet-input-error for="title"/>
                        </div>

                        <div class="mt-2">
                            <x-jet-label for="slug" value="{{ __('Slug') }}"/>
                            <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                         :value="old('slug', $post->slug)" autocomplete="off"/>
                            <x-jet-input-error for="slug"/>
                        </div>

                        <div class="mt-2">
                            <x-jet-label for="content" value="{{ __('Content') }}"/>

                            <textarea id="content" name="content" rows="6"
                                      class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('content', $post->content) }}</textarea>

                            <x-jet-input-error for="content"/>
                        </div>
                    </div>


                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
