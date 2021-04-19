<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuariosController extends Controller
{
    private $server;

    public function __construct()
    {
        $this->server = 'http://localhost:3001/api/user/';
        $this->middleware('check.session');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $token = session('token', '');
        $id = session('user_id', '');

        $usuario = Http::withHeaders([
            'token' => "Bearer $token"
        ])->get($this->server.$id)->json();

        if(isset($usuario['error'])){
            session()->forget('token');
            return redirect("/login");
        }

        return view('usuarios/conteudo', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $token = session('token', '');
        $id = session('user_id', '');

        $usuario = [
            'name' => $request->name,
            'password' =>  $request->password,
            'email' =>  $request->email,
        ];

        $result =  Http::withHeaders([
            'token' => "Bearer $token",
        ])->put( $this->server.$id, $usuario);

        if($result->status() == 401){
            session()->forget('token');
        }

        return redirect('/');
    }

}
