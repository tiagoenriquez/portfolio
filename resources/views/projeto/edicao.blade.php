@extends("index")

@section("conteudo")

@include("menu")

<main>
    @include("erro")
    <h1>Edição de Projeto</h1>
    <img src="{{ asset('images/' . $projeto->url_da_imagem) }}" alt="foto">
    <form action="{{ route('atualizar-projeto', [$token, $projeto->id]) }}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="campo-de-digitacao">
            <label for="nome">Nome do Projeto</label>
            <input type="text" id="nome" name="nome" value="{{ $projeto->nome }}" autofocus required />
        </div>
        <div class="campo-de-digitacao">
            <label for="url">URL do Projeto</label>
            <input type="text" id="url" name="url" value="{{ $projeto->url }}" required />
        </div>
        <div class="campo-de-digitacao">
            <label for="repositorio">URL do Repsitório</label>
            <input type="text" id="repositorio" name="repositorio" value="{{ $projeto->repositorio }}" required />
        </div>
        <div class="campo-de-digitacao">
            <label class="label-de-imagem" for="imagem">Nova Imagem do Projeto</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" onchange="escreverImagem(event)" />
            <input type="text" id="url_da_imagem" readonly />
        </div>
        <textarea id="descricao" name="descricao" cols="50" rows="16" onfocus="selecionarCampoDescricao()">
            {{ $projeto->descricao }}
        </textarea>
        <button type="submit">Atualizar</button>
    </form>
</main>

@include("projeto.script")

@endsection