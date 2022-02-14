<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create role') }}</h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}"></x-jet-label>
                            <x-jet-input id="title" class="block mt-1 w-full @error('title') is-invalid @enderror"
                                         type="text" name="title" autofocus autocomplete="off"/>
                            <x-jet-input-error for="title"/>
                        </div>


                        <div class="mt-4">
                            <x-jet-label for="permissions" value="{{ __('Permissions') }}"/>

                            <select name="permissions[]" id="roles"
                                    class="form-multiselect block rounded-md shadow-sm mt-1 block w-full"
                                    multiple="multiple">
                                @foreach($permissions as $id => $permission)
                                    <option
                                        value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $permission }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="permissions"/>
                        </div>
                    </div>


                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
