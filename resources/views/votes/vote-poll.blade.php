<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vote Polls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Poll Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Started
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ends
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($myAssignedPolls as $poll)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $poll->poll_title }}
                                    </th>
                                    <td class="px-6 py-4" >
                                        {{ $poll->cat_title }}
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        {{ Carbon\Carbon::parse($poll->starts_at)->toFormattedDayDateString() }} <br>
                                    </td>
                                    <td class="px-6 py-4 text-xs">
                                        {{ Carbon\Carbon::parse($poll->ends_at)->toFormattedDayDateString() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($poll->pollAssignedStatus == 0)
                                            <a href="#" class="font-medium text-red-600 dark:text-red-500"> Vote <i class="text-red-500 fa-solid fa-people-group"></i></a>
                                        @else
                                            <p class="font-medium text-amber-600 dark:text-amber-500"> Voted <i class="text-amber-500 fa-solid fa-people-group"></i> </p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>