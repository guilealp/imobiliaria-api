<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteRequest $request)
    {
        $usuario = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
            'email' => $request->email,
            'data de nacimento' => $request->data,
            'cep' => $request->cep,
            'endereço' => $request->endereço,
            'bairro' => $request->bairro,
            'password' => Hash::make($request->password)

        ]);
        return response()->json([
            "success"=> true,
            "message"=> "usuario cadastrado com sucesso",
            "data" => $usuario
        ], 200);
    }
}
