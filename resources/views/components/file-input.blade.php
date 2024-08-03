@props([
    'inputHelp' => "SVG, PNG, JPG or GIF (MAX. 1024x1024).",
    'name' => 'file',
])

<input name="{{ $name }}" {!! $attributes->merge(['class' => 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) !!} aria-describedby="file_input_help" type="file">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">{{ $inputHelp }}</p>
