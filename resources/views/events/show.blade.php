@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        {{ $event->name }}
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">
                        {{ $event->event_date->format('l, F j, Y \a\t g:i A') }}
                    </p>
                    <p class="mt-2 text-lg text-gray-500">
                        Location: {{ $event->location }}
                    </p>
                    <div class="mt-8 prose prose-blue text-gray-500 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1">
                        <!-- Description would go here if added to model, currently not in migration but maybe implied? -->
                        <!-- Assuming no description field in migration, just showing details -->
                        <p>Status: <span class="capitalize">{{ $event->status }}</span></p>
                    </div>
                    <div class="mt-8 sm:flex">
                        @if($event->registration_link)
                            <div class="rounded-md shadow">
                                <a href="{{ $event->registration_link }}" target="_blank" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    Register Now
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="rounded-lg shadow-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ $event->banner ? Storage::url($event->banner) : 'https://via.placeholder.com/600x400' }}" alt="{{ $event->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
