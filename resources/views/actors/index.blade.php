@extends('layouts.app')

@section('content')
    <div class="container ml-20 md:mx-auto px-4 py-16">
        <div class="popular-actors">
            <h2 class=" text-lg text-orange-500 font-semibold uppercase tracking-wider"> Popular Actors</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{route('actors.show',$actor['id'])}}"><img
                                src={{'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path']}}
                                alt="" class="hover:opacity-60 transition ease-in-out duration-300"></a>
                        <div class="mt-4">
                            <a href="{{route('actors.show',$actor['id'])}}" class=" text-lg font-semibold hover:text-gray-500"> {{$actor['name']}} </a>
                            <div class="text-sm truncate text-gray-400">  </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
