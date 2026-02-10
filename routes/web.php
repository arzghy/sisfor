<?php

use App\Models\Article;
use App\Models\Event;
use App\Models\GalleryAlbum;
use App\Models\News;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestNews = News::latest('published_at')->take(3)->get();
    $upcomingEvents = Event::where('status', 'upcoming')->orderBy('event_date')->take(3)->get();
    return view('home', compact('latestNews', 'upcomingEvents'));
})->name('home');

Route::get('/about', function () {
    $teamMembers = TeamMember::all();
    return view('about', compact('teamMembers'));
})->name('about');

Route::get('/events', function () {
    $events = Event::orderBy('event_date', 'desc')->paginate(9);
    return view('events.index', compact('events'));
})->name('events.index');

Route::get('/events/{event:slug}', function (Event $event) {
    return view('events.show', compact('event'));
})->name('events.show');

Route::get('/gallery', function () {
    $albums = GalleryAlbum::with('thumbnail')->latest()->paginate(9);
    return view('gallery.index', compact('albums'));
})->name('gallery.index');

Route::get('/gallery/{album:slug}', function (GalleryAlbum $album) {
    $album->load('photos');
    return view('gallery.show', compact('album'));
})->name('gallery.show');

Route::get('/articles', function () {
    $articles = Article::latest()->paginate(9);
    return view('articles.index', compact('articles'));
})->name('articles.index');

Route::get('/articles/{article:slug}', function (Article $article) {
    return view('articles.show', compact('article'));
})->name('articles.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
