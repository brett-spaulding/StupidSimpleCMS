<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Media Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ $target }}" method="POST">

                        @if($method == 'PUT')
                            @method('PUT')
                        @endif

                        @csrf
                        <div class="flex gap-3 mb-6">
                            <div class="w-1/3">
                                <label for="title">Title</label>
                                <x-text-input name="title" value="{{ $mediaLink?->title }}" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div class="w-1/3">
                                <label for="icon">Icon <a href="https://icons8.com/line-awesome" target="_blank"><i class="las la-info-circle"></i></a></label>
                                <x-text-input name="icon" value="{{ $mediaLink?->slug }}" type="text" required="required" placeholder="lab la-facebook" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div class="w-1/3">
                                <label for="url">Page Title</label>
                                <x-text-input name="url" value="{{ $mediaLink?->title }}" type="text" required="required" placeholder="https://example.com/you" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                        </div>


                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            Submit
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
