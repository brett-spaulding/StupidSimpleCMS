<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/content/create"><i class="las la-plus-square"></i></a>
            {{ __('Pages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3 text-center">Published</th>
                                <th scope="col" class="px-6 py-3">Slug</th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contentPages as $contentPage)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="/content/{{$contentPage->id}}/edit">{{ $contentPage->name }}</a></th>
                                    <td class="px-6 py-4 text-center">
                                        <button hx-post="/content/{{$contentPage->id}}/togglePublish"
                                                hx-headers='{"X-CSRF-Token": "{{ csrf_token() }}"}'
                                        >
                                            <i @class([
                                                'las',
                                                'la-toggle-off' => !$contentPage->published,
                                                'la-toggle-on text-green-700' => $contentPage->published,
                                            ])></i>

                                        </button>
                                    </td>
                                    <td class="px-6 py-4">/{{ $contentPage->slug }}</td>
                                    <td class="px-6 py-4">{{ $contentPage->title }}</td>
                                    <td class="px-6 py-4 float-end">
                                        <button hx-delete="/content/{{$contentPage->id}}"
                                                hx-headers='{"X-CSRF-Token": "{{ csrf_token() }}"}'
                                                hx-confirm="Are you sure you wish to delete page: {{ $contentPage->name }}?"
                                        >
                                            <i class="las la-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <p>No pages yet, <a href="/content/create" class="underline">create one</a> now!</p>
                            @endforelse
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
