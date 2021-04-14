<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FloresController extends Controller
{
    private $server;

    public function __construct()
    {
        $this->server = 'http://localhost:3001/api/flower/';
        $this->middleware('check.session');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flores = Http::get($this->server)->json();

        return view('flores.index', ['flores' => $flores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flores.conteudo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $token = session('token', '');
        $flores = Http::withHeaders(['token'=>"Bearer $token"])->post($this->server,[
            'names' => $request->names,
            'family' => $request->family,
            'scientificName' => $request->scientificName,
            'flowerResources' => $request->flowerResources,
            'images' => $request->images,
            'reference' => $request->reference,
            'author' => $request->clinicalManifestation
        ]);

        $status = $flores->status();
        if ($status==401) {
            session()->forget('token'); 
        }   
        return redirect('/flores');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flor = Http::get($this->server . $id)->json();

        return view('flores/conteudo', ['flor' => $flor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $token = session('token', '');
        $flores = Http::withHeaders(['token'=>"Bearer $token"])->put($this->server.$id,[
            'names' => $request->names,
            'family' => $request->family,
            'scientificName' => $request->scientificName,
            'flowerResources' => $request->flowerResources,
            'images' => $request->images,
            'reference' => $request->reference,
            'author' => $request->author,
        ]);

        $status = $flores->status();
        if ($status==401) {
            session()->forget('token'); 
        }   
        return redirect('/flores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete($this->server . $id);
        return redirect('/flores');
    }
}
