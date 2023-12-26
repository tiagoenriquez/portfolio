<?php

class ItemDeMenu
{
    public $url;
    public $texto;

    function __construct(string $url, string $texto)
    {
        $this->url = $url;
        $this->texto = $texto;
    }
}

$itensDeMenu = [
    new ItemDeMenu("cadastrar-projeto", "Cadastrar Projeto"),
    new ItemDeMenu("lista-de-projetos", "Projetos"),
    new ItemDeMenu("editar-credencial", "Editar Credenciais"),
    new ItemDeMenu("deslogar", "Logout")
];

?>

<header>
    <nav>
        @foreach ($itensDeMenu as $itemDeMenu)
        <a href="{{ route($itemDeMenu->url, $token) }}">{{ $itemDeMenu->texto }}</a>
        @endforeach
    </nav>
</header>