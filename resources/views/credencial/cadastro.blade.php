@extends("index")

@section("conteudo")

<main>
    @include("erro")
    <h1>Cadastro de Credencial</h1>
    <form action="{{ route('inserir-credencial') }}" method="post">
        @csrf
        <div class="campo-de-digitacao">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" autofocus required />
        </div>
        <div class="campo-de-digitacao">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div class="campo-de-digitacao">
            <label for="confirmacao">Confirme sua senha</label>
            <input type="password" id="confirmacao" name="confirmacao" required>
        </div>
        <button type="submit">Cadastrar Credencais</button>
    </form>
</main>

@endsection