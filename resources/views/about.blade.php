@extends('layouts.app')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    About Us
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    KSPM (Kelompok Studi Pasar Modal) is a student organization dedicated to educating and empowering students in the field of capital markets.
                </p>
            </div>

            <div class="mt-20">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-10">Our Team</h3>
                <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($teamMembers as $member)
                        <div class="text-center">
                            <div class="space-y-4">
                                <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="{{ $member->photo ? Storage::url($member->photo) : 'https://via.placeholder.com/150' }}" alt="{{ $member->name }}">
                                <div class="space-y-2">
                                    <div class="text-lg leading-6 font-medium space-y-1">
                                        <h3>{{ $member->name }}</h3>
                                        <p class="text-blue-600">{{ $member->role }}</p>
                                    </div>
                                    <div class="text-lg">
                                        <p class="text-gray-500">{{ $member->division }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
