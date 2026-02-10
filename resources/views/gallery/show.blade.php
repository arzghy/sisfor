@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $album->title }}
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    {{ $album->event_date ? $album->event_date->format('F j, Y') : '' }}
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($album->photos as $photo)
                    <div class="relative group">
                        <img class="h-auto max-w-full rounded-lg object-cover w-full aspect-square" src="{{ Storage::url($photo->image_path) }}" alt="{{ $photo->caption }}">
                        @if($photo->caption)
                            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 rounded-b-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-sm text-center">{{ $photo->caption }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
