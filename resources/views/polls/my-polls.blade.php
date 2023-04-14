<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Polls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-3 gap-4 p-6 text-gray-900 dark:text-gray-100">
                    {{-- Loop --}}
                    @foreach ($myPolls as $poll)
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <h5 class="mb-0 text-2xl font-bold capitalize tracking-tight text-gray-900 dark:text-white truncate">{{ $poll->title }}</h5>
                                <p class="mb-3 text-xs">{{ Carbon\Carbon::parse($poll->created_at)->toFormattedDayDateString() }}</p>
                            </a>
                            
                            <div class="grid grid-cols-2 gap-2 mb-2">
                                <div>
                                    <p class="font-bold">Started</p>
                                    <span class="font-light text-xs">{{ Carbon\Carbon::parse($poll->starts_at)->toFormattedDayDateString() }}</span>
                                </div>
                                <div>
                                    <p class="font-bold">End</p>
                                    <span class="font-light text-xs">{{ Carbon\Carbon::parse($poll->ends_at)->toFormattedDayDateString() }}</span>
                                </div>
                            </div>
                            <a href="{{ route('myPolls.show', $poll) }}" class="inline-flex items-center bottom px-3 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    @endforeach
                    
                </div>

            </div>
        </div>
    </div>
</x-app-layout>