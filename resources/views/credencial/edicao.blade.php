@extends("index")

@section("conteudo")

@include("menu")

<main>
    <form action="{{ route('atualizar-credencial', $token) }}" method="post">
        @method('put')
        @csrf
        <h1>Edição de Credenciais</h1>
        @include("erro")
        <div class="campo-de-digitacao">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" value="{{ $credencial->login }}" autofocus required />
        </div>
        <div class="campo-de-digitacao">
            <label for="senha">Digite nova senha</label>
            <input type="password" id="senha" name="senha" required />
        </div>
        <div class="campo-de-digitacao">
            <label for="confirmacao">Confirme nova senha</label>
            <input type="password" id="confirmacao" name="confirmacao" />
        </div>
        <button type="submit">Atualizar Credenciais</button>
    </form>
</main>

@endsection