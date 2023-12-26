@extends("index")

@section("conteudo")

@include("menu")

<main>
    @include("erro")
    <h1>Tem certeza de que deseja excluir</h1>
    <table>
        <thead>
            <tr>
                <td>Chave</td>
                <td>Valor</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Projeto</td>
                <td>{{ $projeto->nome }}</td>
            </tr>
            <tr>
                <td>URL</td>
                <td>{{ $projeto->url }}</td>
            </tr>
            <tr>
                <td>Repositório</td>
                <td>{{ $projeto->repositorio }}</td>
            </tr>
        </tbody>
    </table>
    <h1>?</h1>
    <div class="buttons">
        <form action="{{ route('lista-de-projetos', $token) }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-projeto', [$token, $projeto->id]) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection