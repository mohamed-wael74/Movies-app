@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-5 pt-8">
        <div class="popular-movies">
            <h2 class=" text-lg text-orange-500 font-semibold uppercase tracking-wider"> Popular Movies</h2>
            <div class="row">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="border-b border-gray-200 mt-8"></div>
    <div class="container mx-auto px-5 pt-8">
        <div class="now-playing-movies">
            <h2 class=" text-lg text-orange-500 font-semibold uppercase tracking-wider"> Top Rated</h2>
            <div class="row">
                @foreach ($topRated as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="border-b border-gray-200 mt-8"></div>
    <div class="container mx-auto px-5 pt-8">
        <div class="now-playing-movies ">
            <h2 class=" text-lg text-orange-500 font-semibold uppercase tracking-wider"> Upcoming </h2>
            <div class="row">
                @foreach ($upcoming as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
