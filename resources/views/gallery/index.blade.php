@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Gallery
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Memories from our past events.
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                @foreach($albums as $album)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <a href="{{ route('gallery.show', $album) }}">
                                <img class="h-48 w-full object-cover hover:opacity-75 transition duration-150 ease-in-out" src="{{ $album->thumbnail ? Storage::url($album->thumbnail) : 'https://via.placeholder.com/400x300' }}" alt="{{ $album->title }}">
                            </a>
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <a href="{{ route('gallery.show', $album) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $album->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ $album->event_date ? $album->event_date->format('M d, Y') : '' }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $albums->links() }}
            </div>
        </div>
    </div>
@endsection
