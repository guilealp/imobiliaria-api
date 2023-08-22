<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;

use App\Models\Cliente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function salvar(ClienteRequest $request)
    {
        $usuario = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
            'email' => $request->email,
            'nacimento' => $request->nacimento,
            'cep' => $request->cep,
            'endereço' => $request->endereço,
            'bairro' => $request->bairro,
            'password' => Hash::make($request->password)

        ]);
        return response()->json([
            "success"=> true,
            "message"=> "cliente cadastrado com sucesso",
            "data" => $usuario
        ], 200);
    }
}
