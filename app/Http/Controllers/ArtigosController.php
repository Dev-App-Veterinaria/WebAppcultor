<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Http;

class ArtigosController extends Controller
{
    private $server;
    private $serverTags;

    public function __construct()
    {
        $this->server = 'http://localhost:3001/api/article/';
        $this->serverTags = 'http://localhost:3001/api/tag/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $artigos = Http::get($this->server)->json();

        return view('artigos.index', ['artigos' => $artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $tags = Http::get($this->serverTags)->json();

        $tagsFilter = array_filter($tags, function ($tag){
            if($tag['title'] === 'Sobre o App' || $tag['title'] === 'Flora apícola'){
                return false;
            }
            return true;
        });

        return view('artigos.conteudo', ['tags' => $tagsFilter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $artigo = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
            'language' => $request->input('language'),
            'author' => $request->input('author')
        ];

        Http::post($this->server, $artigo);

        return redirect('/artigos');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|Response
     */
    public function edit(string $id)
    {
        $artigo = Http::get($this->server . $id)->json();
        $tags = Http::get($this->serverTags)->json();

        $tagsFilter = array_filter($tags, function ($tag){
            if($tag['title'] === 'Sobre o App' || $tag['title'] === 'Flora apícola'){
                return false;
            }
            return true;
        });

        return view('artigos/conteudo', ['artigo' => $artigo, 'tags' => $tagsFilter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, string $id)
    {
        $artigo = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
            'language' => $request->input('language'),
            'author' => $request->input('author')
        ];

        Http::put($this->server . $id, $artigo);

        return redirect('/artigos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(string $id)
    {
        Http::delete($this->server . $id);
        return redirect('/artigos');
    }
}
