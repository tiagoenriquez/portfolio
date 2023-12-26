@extends("index")

@section("conteudo")

@include("menu")

<main>
    @include("erro")
    <h1>Cadastro de Projeto</h1>
    <form action="{{ route('inserir-projeto', $token) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="campo-de-digitacao">
            <label for="nome">Nome do Projeto</label>
            <input type="text" id="nome" name="nome" autofocus required />
        </div>
        <div class="campo-de-digitacao">
            <label for="url">URL do Projeto</label>
            <input type="text" id="url" name="url" required />
        </div>
        <div class="campo-de-digitacao">
            <label for="repositorio">URL do Repositório</label>
            <input type="text" id="repositorio" name="repositorio" required />
        </div>
        <div class="campo-de-digitacao">
            <label class="label-de-imagem" for="imagem">Imagem do Projeto</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" onchange="escreverImagem(event)" />
            <input type="text" id="url_da_imagem" readonly />
        </div>
        <textarea id="descricao" name="descricao" cols="50" rows="16" onfocus="selecionarCampoDescricao()">
            Escreva aqui a descrição do projeto.
        </textarea>
        <button type="submit">Inserir</button>
    </form>
</main>

@include("projeto.script")

@endsection