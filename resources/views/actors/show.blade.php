@extends('layouts.app')

@section('content')
<div class="movies-info border-b border-gray-200 ">
    <div class=" container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2' . $popularActors['profile_path'] }}" alt="" class=" w-64 md:w-80">
        <div class="md:ml-24">
            <h2 class=" text-3xl font-semibold"> {{$popularActors['name']}} </h2>
            <div class=" flex flex-wrap items-center text-gray-400 text-sm">
                <span> {{$popularActors['birthday']}} </span>
                <span class=" mx-2">|</span>
                <span> {{$popularActors['place_of_birth']}} </span>
            </div>
            <p class="text-gray-500 mt-5">
                {{$popularActors['biography']}}
            </p>
        </div>
    </div>
</div>
@endsection
