<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>

            <a href="{{ route('roles.create') }}"
               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a>
        </div>

    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated At
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deleted At
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Permissions
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($roles as $role)

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $role->id  }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $role->title  }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if($role->created_at !== null)
                                                    {{ date('d.m.Y', strtotime($role->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if($role->updated_at !== null)
                                                    {{ date('d.m.Y', strtotime($role->updated_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if ($role->deleted_at !== null)
                                                    {{ date('d.m.Y', strtotime($role->deleted_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>

                                        <td class="px-6 py-4" style="max-width: 200px;">
                                            <div class="flex flex-row gap-2 flex-wrap text-sm text-gray-900">
                                                @if ($role->permissions->isEmpty())
                                                    No permissions
                                                @endif

                                                @foreach($role->permissions as $permission)
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $permission->title  }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex flex-row items-center h-full gap-3">
                                                {{--                                                <a href="{{ route('users.show', $user->id) }}"--}}
                                                {{--                                                   class="text-blue-600 hover:text-blue-900">View</a>--}}
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form class="inline-block"
                                                      action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit"
                                                           class="text-red-600 hover:text-red-900 cursor-pointer"
                                                           value="Delete">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
