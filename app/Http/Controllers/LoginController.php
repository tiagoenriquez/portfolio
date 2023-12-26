<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use App\Models\Token;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $projetoController;

    function __construct()
    {
        $this->projetoController = new ProjetoController();
    }

    function deslogar(string $token): RedirectResponse
    {
        $this->validarToken($token);
        $this->excluir();
        return redirect()->route("principal");
    }

    function logar(Request $request): RedirectResponse
    {
        try {
            $this->excluir();
            $token = Token::create($request->all());
            $token->save();
            $token = Token::first();
            var_dump($token);
            return redirect()->route("lista-de-projetos", $token->valor);
        } catch (Exception $exception) {
            return redirect()->route("formulario-de-login")->withErrors([$exception->getMessage()]);
        }
    }

    function mostrarFormulario(): View | RedirectResponse
    {
        $credenciais = Credencial::all()->toArray();
        if (!empty($credenciais)) {
            return view("login");
        } else {
            return redirect()->route("cadastrar-credencial");
        }
    }

    private function excluir(): void
    {
        $token = Token::first();
        if ($token) {
            $token->delete();
        }        
    }
}