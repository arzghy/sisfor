@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-base font-semibold tracking-wide text-blue-600 uppercase">
                    {{ $article->level }} &bull; {{ $article->topic }}
                </p>
                <h1 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $article->title }}
                </h1>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Published on {{ $article->created_at->format('F j, Y') }}
                </p>
            </div>
            
            <div class="mt-12 prose prose-blue prose-lg text-gray-500 mx-auto">
                {!! $article->content !!}
            </div>

            @if($article->attachment)
                <div class="mt-8 border-t border-gray-200 pt-8">
                    <h3 class="text-lg font-medium text-gray-900">Attachment</h3>
                    <div class="mt-2">
                        <a href="{{ Storage::url($article->attachment) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                            </svg>
                            Download Attachment
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
