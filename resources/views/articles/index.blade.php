@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Articles & Insights
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Learn about capital markets from our experts.
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                @foreach($articles as $article)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-blue-600">
                                    {{ $article->level }}
                                </p>
                                <a href="{{ route('articles.show', $article) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $article->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ Str::limit(strip_tags($article->content), 150) }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="sr-only">{{ $article->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $article->topic }}
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                                            {{ $article->created_at->format('M d, Y') }}
                                        </time>
                                        <span aria-hidden="true">&middot;</span>
                                        <span>{{ $article->views }} views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
