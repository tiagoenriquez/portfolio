@extends("index")

@section("conteudo")

@include("menu")

<main>
    <h1>Lista de Projetos</h1>
    <table>
        <thead>
            <tr>
                <td>Projeto</td>
                <td>URL</td>
                <td>Repositório</td>
                <td></td><td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($projetos as $projeto)
            <tr>
                <td>{{ $projeto->nome }}</td>
                <td>{{ $projeto->url }}</td>
                <td>{{ $projeto->repositorio }}</td>
                <td>
                    <form action="{{ route('editar-projeto', [$token, $projeto->id]) }}" method="get">
                        <button type="submit">
                            <img class="icone" src="{{ asset('assets/caneta2.png') }}" alt="Atualizar">
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-projeto', [$token, $projeto->id]) }}" method="get">
                        <button type="submit">
                            <img class="icone" src="{{ asset('assets/lixeira.png') }}" alt="Excluir">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>
</main>

@endsection