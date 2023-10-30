@extends('layouts.app')

@section('content')
<div class="movies-info border-b border-gray-200 ">
    <div class=" container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] }}" alt="" class=" w-64 md:w-80">
        <div class="md:ml-24">
            <h2 class=" text-3xl font-semibold"> {{ $tvShow['name'] }} </h2>
            <div class=" flex flex-wrap items-center text-gray-400 text-sm">
                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <path
                            d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                            data-name="star" />
                    </g>
                </svg>
                <span class=" ml-1">{{ $tvShow['vote_average'] * 10 . '%' }}</span>
                <span class=" mx-2">|</span>
                <span>{{ $tvShow['last_air_date'] }}</span>
            </div>
            <p class="text-gray-500 mt-5">{{ $tvShow['overview'] }}
            </p>
        </div>
    </div>
</div>
<div class="movie-cast border-b border-gray-200">
    <div class="container mx-auto px-5 py-10">
        <h2 class=" text-3xl font-semibold">Cast</h2>
        <div class="row">
            @foreach ($tvShow['credits']['cast'] as $cast)
                @if ($loop->index < 6)
                    <div class=" mt-8 col-xl-2 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{route('actors.show',$cast['id'])}}">
                            <img src="{{ 'http://image.tmdb.org/t/p/w300' . $cast['profile_path'] }}" alt=""
                                class=" w-60 md:w-64  hover:opacity-80 transition ease-in-out duration-300 ">
                        </a>
                        <div class=" mt-2 ">
                            <a href="{{route('actors.show',$cast['id'])}}" class=" text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            <div class="text-gray-400 text-sm">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="tv-images border-b border-gray-200">
    <div class="container mx-auto px-5 py-10">
        <h2 class=" text-3xl font-semibold">Images</h2>
        <div class="row">
            @foreach ($tvShow['images']['backdrops'] as $image)
                @if ($loop->index < 8)
                    <div class=" mt-8 col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <a href="#">
                            <img src="{{ 'http://image.tmdb.org/t/p/w300'. $image['file_path'] }}"
                                alt=""
                                class=" w-60 md:w-64 hover:opacity-80 transition ease-in-out duration-300 ">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
