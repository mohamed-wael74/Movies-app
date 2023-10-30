@extends('layouts.app')

@section('content')
    <div class="movies-info border-b border-gray-200 ">
        <div class=" container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="" class=" w-64 md:w-80">
            <div class="md:ml-24">
                <h2 class=" text-3xl font-semibold"> {{ $movie['title'] }} </h2>
                <div class=" flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path
                                d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star" />
                        </g>
                    </svg>
                    <span class=" ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class=" mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class=" mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-500 mt-5">{{ $movie['overview'] }}
                </p>
                <div class=" mt-6">
                    <h4 class=" text-white text-lg font-bold">Featured Crew</h4>
                    <div class=" flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class=" mr-8">
                                    <div> {{ $crew['name'] }} </div>
                                    <div class=" text-sm text-gray-400"> {{ $crew['job'] }} </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-6">
                        <a href="http://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                            class="  inline-flex items-center rounded px-5 py-4 text-gray-200 bg-orange-500 hover:bg-orange-600 transition ease-in-out duration-300">
                            <svg class="w-6 fill-current text-white" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                            <span class="ml-2 text-white"> Watch Trailer </span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-200">
        <div class="container mx-auto px-5 py-10">
            <h2 class=" text-3xl font-semibold">Cast</h2>
            <div class="row">
                @foreach ($movie['credits']['cast'] as $cast)
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
    <div class="movie-cast border-b border-gray-200">
        <div class="container mx-auto px-5 py-10">
            <h2 class=" text-3xl font-semibold">Images</h2>
            <div class="row">
                @foreach ($movie['images']['backdrops'] as $image)
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
