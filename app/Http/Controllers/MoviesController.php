<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{

    protected $base_url = "https://api.themoviedb.org/3";
    protected $api_key  = "53fea6e107412f56b4668cf203d28358";

    public function index()
    {
        $popularMovies = Http::get($this->base_url.'/movie/popular?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        $topRated = Http::get($this->base_url.'/movie/top_rated?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        $upcoming = Http::get($this->base_url.'/movie/upcoming?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        $genresArray = Http::get($this->base_url.'/genre/movie/list?api_key='.$this->api_key.'&language=en-US')->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        }) ;

        return view('movies.index'
        ,compact("popularMovies","genres","topRated","upcoming")) ;
    }

    public function show($id)
    {
        $movie = Http::get($this->base_url.'/movie/'.$id.'?api_key='.$this->api_key.'&append_to_response=credits,videos,images')->json();
    //    dump($movie);
        return view('movies.show'
        ,compact("movie")) ;
    }

}
