@props([
    'type' => 'success',
    'colors' => [
        'success' => 'bg-green-100 border-l-4 border-green-500 text-green-700 p-4',
        'error' => 'bg-red-100 border-l-4 border-red-500 text-red-700 p-4',
        'warning' => 'bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4',
    ],
    'icons' => [
        'success' => 'fa-solid fa-check fa-lg',
        'error' => 'fa-solid fa-xmark fa-lg',
        'warning' => 'fa-solid fa-exclamation fa-lg',
    ]
])

<div id="toast-default" class="flex items-center w-full max-w-xs p-4 mb-4 {{ $colors[$type] }}" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <i class="{{ $icons[$type] }}"></i>
    </div>
    <div class="ml-3 text-sm font-normal">{{ $slot }}</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 px-2" data-dismiss-target="#toast-default" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
