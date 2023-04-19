<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Poll Details') }}
        </h2>

        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

    </x-slot> --}}

    <div class="p-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-breadcrumbs></x-breadcrumbs>

            <div class="mt-10">
                <p class="mb-0 text-sm font-light text-gray-900 dark:text-white">Poll Title</p>
                <h1 class="mb-0 text-3xl font-semibold text-red-900 dark:text-red-600">{{ $pollDetails->title }}</h1>
                <p class="m-0 text-xs font-light text-gray-900 dark:text-white">{{ Carbon\Carbon::parse($pollDetails->created_at)->toFormattedDayDateString() }}</p>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="grid grid-flow-col auto-cols">
                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="mr-2">
                                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">About</button>
                            </li>
                            <li class="mr-2">
                                <button id="qAndA-tab" data-tabs-target="#qAndA" type="button" role="tab" aria-controls="qAndA" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Q&A</button>
                            </li>
                            <li class="mr-2">
                                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Results and Poll Statistics</button>
                            </li>
                        </ul>
                        <div id="defaultTabContent">
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="ta bpanel" aria-labelledby="about-tab">
                                <div class="grid grid-flow-col gap-2 auto-cols">
                                    <div>
                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Timeline</dt>
                                                <div class="flex flex-row justify-between gap-2">
                                                    <div>
                                                        <div class="flex flex-col pb-3">
                                                            <dt class="mb-1 text-red-500 md:text-xs dark:text-red-400">Start</dt>
                                                            <dd class="text-md font-semibold">{{ Carbon\Carbon::parse($pollDetails->starts_at)->toFormattedDateString() }}</dd>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="flex flex-col pb-3">
                                                            <dt class="mb-1 text-red-500 md:text-xs dark:text-red-400">End</dt>
                                                            <dd class="text-md font-semibold">{{ Carbon\Carbon::parse($pollDetails->ends_at)->toFormattedDateString() }}</dd>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col py-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Meta Title</dt>
                                                <dd class="text-md font-semibold">{{ $pollDetails->pollCategory->category->meta_title }}</dd>
                                            </div>
                                            <div class="flex flex-col pt-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Slug</dt>
                                                <dd class="text-md font-semibold">{{ $pollDetails->pollCategory->category->slug }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div>
                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Content</dt>
                                                <dd class="text-md font-semibold">{{ $pollDetails->pollCategory->category->content }}</dd>
                                            </div>
                                        </dl>

                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-col pb-3">
                                                <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Description</dt>
                                                <dd class="text-md font-semibold">{{ $pollDetails->description }}</dd>
                                            </div>
                                        </dl>

                                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                            <div class="flex flex-row justify-between gap-5 pb-3">
                                                <div>
                                                    <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Published?</dt>
                                                    <dd class="text-md font-semibold">
                                                        @if ($pollDetails->is_published == 0)
                                                            No
                                                        @else
                                                            Yes
                                                            <p class="font-light text-xs">
                                                                {{ Carbon\Carbon::parse($pollDetails->updated_at)->toFormattedDayDateString() }}
                                                            </p>
                                                        @endif
                                                    </dd>
                                                </div>
                                                <div>
                                                    <dt class="mb-1 text-gray-500 md:text-sm dark:text-gray-400">Assigned Voters</dt>
                                                    <dd class="text-md font-semibold">
                                                        <i class="text-amber-500 fa-solid fa-people-group"></i> {{ $pollDetails->assigned_users_count }}
                                                    </dd>
                                                </div>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="qAndA" role="tabpanel" aria-labelledby="qAndA-tab">
                                <h2 class="mb-5 text-xl font-extrabold tracking-tight text-gray-900 dark:text-white">Here's your list of questions and its choices</h2>
                                <!-- List -->
                                <ul class="space-y-4 text-gray-500 list-inside dark:text-gray-400">
                                    @foreach ($pollDetails->pollQuestions as $key => $pq_data)
                                    <li>
                                        <span class="leading-tight font-light text-red-500">
                                            Question {{$key+1}}. {{ $pq_data->content }}
                                        </span>
                                        <p class="text-xs italic">{{ $pq_data->pollQuestionType->name }}</p>
                                       <ul class="pl-5 mt-2 space-y-1 list-disc list-inside">
                                        @if ($pq_data->poll_question_type_id != 3)
                                            @foreach ($pq_data->pollAnswers as $key => $pa_data)
                                                <li>{{ $pa_data->content }}</li>
                                            @endforeach
                                        @endif
                                        
                                       </ul>
                                    </li>
                                    @endforeach
                                 </ul>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                                <ul class="space-y-4 text-gray-500 list-inside dark:text-gray-400">
                                    @php
                                        $highestValue = null;
                                        $highestKeys = [];
                                    @endphp
                                    @foreach ($pollDetails['pollQuestions'] as $pq_data)
                                    <li>
                                        <span class="leading-tight font-light text-red-500">
                                            Question {{ $loop->iteration }}. {{ $pq_data->content }}
                                        </span>
                                        <p class="text-xs italic">{{ $pq_data->pollQuestionType->name }}</p>
                                        <ul class="pl-5 mt-2 space-y-1 list-disc list-inside">
                                            @if ($pq_data->poll_question_type_id != 3)
                                                @foreach ($pq_data['pollAnswers'] as $pa_key => $pa_data)
                                                    @if ($highestValue === null || $pa_data['poll_votes_count'] > $highestValue)
                                                        @php
                                                            $highestValue = $pa_data['poll_votes_count'];
                                                            $highestKeys = [$pa_key+1];
                                                        @endphp
                                                    @elseif ($pa_data['poll_votes_count'] === $highestValue)
                                                        @php
                                                            $highestKeys[] = $pa_key+1;
                                                        @endphp
                                                    @endif

                                                    <li>
                                                        <span> {{ $pa_key+1 }}. {{ $pa_data['content'] }} </span>
                                                        <span class="leading-tight bg-red-100 text-red-800 text-xs font-medium items-center px-2 py-0.5 rounded-full dark:bg-white-700 dark:text-red-400 border border-red-400">
                                                            {{ $pa_data['poll_votes_count'] }} votes
                                                        </span>
                                                    </li>
                                                @endforeach
                                                
                                                <p class="font-bold text-sm text-amber-600"><i class="fa-solid fa-trophy"></i> Winner, {{ count($highestKeys) > 1 ? 'both' : '' }} choice{{ count($highestKeys) > 1 ? 's' : '' }} {{ implode(', ', $highestKeys) }} with {{ $highestValue }} vote{{ $highestValue > 1 ? 's' : '' }}.</p>
                                            @else
                                                {{-- {{ $pq_data['pollAnswers'] }} --}}
                                                <p class="font-bold">This needs to be filled by voters.</p>
                                            @endif
                                        </ul>
                                    </li>

                                    @php
                                        $highestValue = null;
                                        $highestKeys = [];
                                    @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>