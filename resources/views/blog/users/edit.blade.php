<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('put')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}"/>
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         :value="old('name', $user->name)" autofocus autocomplete="off"/>
                            <x-jet-input-error for="name"/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}"/>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                         :value="old('email', $user->email)" autocomplete="off"/>
                            <x-jet-input-error for="email"/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}"/>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                         autocomplete="off"/>
                            <x-jet-input-error for="password"/>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="roles" value="{{ __('Roles') }}"/>

                            <select name="roles[]" id="roles"
                                    class="form-multiselect block rounded-md shadow-sm mt-1 block w-full"
                                    multiple="multiple">
                                @foreach($roles as $id => $role)
                                    <option
                                        value="{{ $id }}"{{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="roles"/>
                        </div>
                    </div>


                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update user
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
