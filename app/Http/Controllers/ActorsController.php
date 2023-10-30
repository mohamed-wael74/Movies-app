<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    protected $base_url = "https://api.themoviedb.org/3";
    protected $api_key  = "53fea6e107412f56b4668cf203d28358";

    public function index()
    {
        $popularActors = Http::get($this->base_url.'/person/popular?api_key='.$this->api_key.'&language=en-US')->json()['results'];
        return view('actors.index'
        ,compact('popularActors'));
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
        $popularActors = Http::get($this->base_url.'/person/'.$id.'?api_key='.$this->api_key.'&language=en-US')->json();
        //dump($popularActors);
        return view('actors.show'
        ,compact('popularActors'));
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
