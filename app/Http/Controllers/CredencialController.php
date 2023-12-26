<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CredencialController extends Controller
{
    function atualizar(string $token, Request $request): RedirectResponse
    {
        try {
            $this->validarToken($token);
            $credencial = Credencial::first();
            $credencial->update($request->all());
            return redirect()->route("lista-de-projetos", $token);
        } catch (Exception $exception) {
            return redirect()->route("editar-credencial", [$token, $credencial])->withErrors($exception->getMessage());
        }
    }

    function cadastrar(): View | RedirectResponse
    {
        $credencial = Credencial::all()->toArray();
        if (empty($credencial)) {
            return view("credencial.cadastro");
        } else {
            return redirect()->route("formulario-de-login");
        }
    }

    function editar(string $token): View
    {
        $this->validarToken($token);
        $credencial = Credencial::first();
        return view("credencial.edicao", [
            "token" => $token,
            "credencial" => $credencial
        ]);
    }

    function inserir(Request $request): RedirectResponse
    {
        try {
            $credencial = Credencial::create($request->except("_token"));
            $credencial->save();
            $projetoController = new ProjetoController();
            return redirect()->route("principal");
        } catch (Exception $exception) {
            return redirect()->route("cadastrar-credencial")->withErrors([$exception->getMessage()]);
        }
    }
}
