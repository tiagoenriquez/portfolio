@extends("index")

@section("conteudo")

<main>
    @include("erro")
    <h1>Login</h1>
    <form action="{{ route('logar') }}" method="post">
        @csrf
        <div class="campo-de-digitacao">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" autofocus required />
        </div>
        <div class="campo-de-digitacao">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required />
        </div>
        <button type="submit">Logar</button>
    </form>
</main>

@endsection