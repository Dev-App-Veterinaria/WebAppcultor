<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TagsController extends Controller
{   
    private $server;

    public function __construct()
    {
        $this->server = 'http://localhost:3001/api/tag/';
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Http::get($this->server)->json();

        return view('tags.index', ['tags'=>$tags]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.conteudo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $tags=[
            'title' => $request->title,
            'tag' =>  $request->tag,
            'image' =>   $request->image
        ];

        Http::post($this->server, $tags);
               
        if($tags){
            return redirect('/tags');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Http::get($this->server.$id)->json();;

        return view('tags/conteudo', ['tag' => $tag]);
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
            
        $tags=[
            'title' => $request->title,
            'tag' =>  $request->tag,
            'image' =>  $request->image
        ];

        Http::put($this->server.$id, $tags);
        
        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete($this->server.$id);
        return redirect('/tags');
    }
}
