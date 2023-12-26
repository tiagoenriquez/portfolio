@extends("index")

@section("conteudo")

<main>
    <h1>{{ strtoupper($projeto->nome) }}</h1>
    <img class="foto" src="{{ asset('images/' . $projeto->url_da_imagem) }}" alt="Imagem">
    <a href="{{ $projeto->url }}" target="_blank">URL</a>
    <a href="{{ $projeto->repositorio }}" target="_blank">Repositório</a>
    <p class="descricao">{{ $projeto->descricao }}</p>
    <a href="{{ route('principal') }}">Voltar para a página principal</a>
</main>

@endsection