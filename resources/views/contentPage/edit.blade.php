<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="/content/{{ $contentPage->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="flex gap-3 mb-6">
                            <div class="w-1/2">
                                <label for="name">Page Name</label>
                                <x-text-input name="name" value="{{ $contentPage->name }}" type="text" required="required" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div class="w-1/2">
                                <label for="slug">Page Slug</label>
                                <x-text-input name="slug" value="{{ $contentPage->slug }}" type="text" required="required" placeholder="/pagename" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                        </div>

                        <div class="flex mb-6">
                            <div class="grow">
                                <label for="title">Page Title</label>
                                <x-text-input name="title" value="{{ $contentPage->title }}" type="text" required="required" placeholder="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                        </div>

                        <div class="flex mb-6">
                            <div class="grow">
                                <label for="content">Page Content</label>
                                <x-textarea-input name="content" rows="12" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $contentPage->content }}</x-textarea-input>
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Update
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
