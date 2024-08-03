<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/social/create"><i class="las la-plus-square"></i></a>
            {{ __('Page Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th></th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">Icon</th>
                                <th scope="col" class="px-6 py-3">URL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mediaLinks as $mediaLink)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th><i class="text-base float-end {{ $mediaLink->icon }}"></i></th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="/social/{{$mediaLink->id}}/edit">{{ $mediaLink->title }}</a></th>
                                    <td class="px-6 py-4">{{ $mediaLink->icon }}</td>
                                    <td class="px-6 py-4">{{ $mediaLink->url }}</td>
                                    <td class="px-6 py-4 float-end">
                                        <button hx-delete="/social/{{$mediaLink->id}}"
                                                hx-headers='{"X-CSRF-Token": "{{ csrf_token() }}"}'
                                                hx-confirm="Are you sure you wish to delete link: {{ $mediaLink->title }}?"
                                        >
                                            <i class="las la-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4">No links yet, <a href="/social/create" class="underline">create one</a> now!</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
