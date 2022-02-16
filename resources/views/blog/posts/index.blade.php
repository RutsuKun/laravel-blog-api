<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>

            <x-jet-button href="{{ route('posts.create')  }}"
                          class="bg-green-500 hover:bg-green-700 text-white font-bold">Create
            </x-jet-button>
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
                                        Author
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
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($posts as $post)

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $post->id  }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <span>{{ $post->title  }}</span>
                                                <small>({{ $post->slug  }})</small>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-row gap-2 items-center">

                                                @if ($post->user->profile_photo_path)
                                                    <img class="h-10 w-10 rounded-full"
                                                         src="{{ $post->user->profile_photo_path }}" alt="">
                                                @else
                                                    <img class="h-10 w-10 rounded-full"
                                                         src="https://eu.ui-avatars.com/api/?name={{ $post->user->name }}&background=6875f5&color=ffffff&bold=true"
                                                         alt="">
                                                @endif
                                                <div class="flex flex-col">
                                                    <span>{{ $post->user->name  }}</span>
                                                    <small>({{ $post->user->email  }})</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if($post->created_at !== null)
                                                    {{ date('d.m.Y', strtotime($post->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if($post->updated_at !== null)
                                                    {{ date('d.m.Y', strtotime($post->updated_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if ($post->deleted_at !== null)
                                                    {{ date('d.m.Y', strtotime($post->deleted_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex flex-row items-center h-full gap-3">
                                                {{--                                                <a href="{{ route('users.show', $user->id) }}"--}}
                                                {{--                                                   class="text-blue-600 hover:text-blue-900">View</a>--}}
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form class="inline-block"
                                                      action="{{ route('posts.destroy', $post->id) }}" method="POST"
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
