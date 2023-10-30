<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TvShowsController extends Controller
{
    protected $base_url = "https://api.themoviedb.org/3";
    protected $api_key  = "53fea6e107412f56b4668cf203d28358";

    public function index()
    {
        $popularTv = Http::get($this->base_url.'/tv/popular?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        $topRated = Http::get($this->base_url.'/tv/top_rated?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        $airingToday = Http::get($this->base_url.'/tv/airing_today?api_key='.$this->api_key.'&language=en-US')->json()['results'];

        //dump($topRated);
        return view('tv-shows.index'
        ,compact("popularTv","topRated","airingToday")) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvShow = Http::get($this->base_url.'/tv/'.$id.'?api_key='.$this->api_key.'&append_to_response=credits,videos,images')->json();
        //dump($tvShow);
        return view('tv-shows.show'
        ,compact("tvShow")) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
