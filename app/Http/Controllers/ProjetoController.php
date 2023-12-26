<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjetoController extends Controller
{
    function ameacar(string $token, int $id): View | RedirectResponse
    {
        $this->validarToken($token);
        $projeto = Projeto::findOrFail($id);
        return view("projeto.ameaca", [
            "token" => $token,
            "projeto" => $projeto
        ]);
    }

    function atualizar(string $token, int $id, Request $request): RedirectResponse
    {
        try {
            $this->validarToken($token);
            $projeto = Projeto::findOrFail($id);
            $projeto->update($request->all());
            $this->limparArquivos();
            return redirect()->route("lista-de-projetos", $token);
        } catch (Exception $exception) {
            return redirect()->route("editar-projeto", [$token, $projeto->id])->withErrors($exception->getMessage());
        }
    }

    function cadastrar(string $token): View
    {
        $this->validarToken($token);
        return view("projeto.cadastro", ["token" => $token]);
    }

    function editar(string $token, int $id): View
    {
        $this->validarToken($token);
        $projeto = Projeto::findOrFail($id);
        return view("projeto.edicao", [
            "token" => $token,
            "projeto" => $projeto,
        ]);
    }

    function excluir(string $token, int $id): RedirectResponse
    {
        try {
            $this->validarToken($token);
            $projeto = Projeto::findOrFail($id);
            $projeto->delete();
            $this->limparArquivos();
            return redirect()->route("lista-de-projetos", $token);
        } catch (Exception $exception) {
            return redirect()->route("excluir-projeto", $token)->withErrors($exception->getMessage());
        }
    }

    function inserir(string $token, Request $request): RedirectResponse
    {
        try {
            $this->validarToken($token);
            $projeto = Projeto::create($request->all());
            $projeto->save();
            return redirect()->route("lista-de-projetos", $token);
        } catch (Exception $exception) {
            return redirect()->route("cadastrar-projeto", $token)->withErrors($exception->getMessage());
        }
    }

    function listar(): View
    {
        try {
            return view("welcome", ["projetos" => Projeto::all()]);
        } catch (Exception $exception) {
            return view("welcome");
        }
    }

    function listarAposLogado(string $token): View
    {
        $this->validarToken($token);
        return view("projeto.lista", [
            "token" => $token,
            "projetos" => Projeto::all()
        ]);
    }

    function mostrar(string $slug): View | RedirectResponse
    {
        try {
            $projetos = Projeto::all();
            $projetoExibido = "";
            foreach($projetos as $projetoSalvo) {
                if (Str::slug($projetoSalvo->nome) === $slug) {
                    $projetoExibido = $projetoSalvo;
                    break;
                }
            }
            if ($projetoExibido === "") {
                throw new Exception("Não existe projeto cadastrado para o slug " . $slug . ".");
            }
            return view("projeto", ["projeto" => $projetoExibido]);
        } catch (Exception $exception) {
            return redirect()->route("principal")->withErrors($exception->getMessage());
        }
    }

    private function limparArquivos(): void
    {
        $imagensNaPasta = File::files(public_path("images"));
        $urlsDeImagens = Projeto::pluck("url_da_imagem")->toArray();
        foreach($imagensNaPasta as $imagem) {
            if (!in_array($imagem->getFilename(), $urlsDeImagens)) {
                File::delete($imagem);
            }
        }
    }
}
