@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Upcoming Events
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Join our workshops, seminars, and competitions.
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                @foreach($events as $event)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover" src="{{ $event->banner ? Storage::url($event->banner) : 'https://via.placeholder.com/400x300' }}" alt="{{ $event->name }}">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-blue-600">
                                    {{ $event->status }}
                                </p>
                                <a href="{{ route('events.show', $event) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $event->name }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ $event->event_date->format('M d, Y H:i') }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ $event->location }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
