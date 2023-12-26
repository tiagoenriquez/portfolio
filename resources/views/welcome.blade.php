@extends("index")

@section("conteudo")

<main>
    @include("erro")
    <img class="foto" src="{{ asset('assets/eu.png') }}" alt="Eu">
    <h1>Portfolio do Tiago</h1>
    <div class="buttons">
        <a href="https://github.com/tiagoenriquez/" target="_blank">
            <img class="icone-grande" src="{{ asset('assets/github.png') }}" alt="Github" title="Meu Github" />
        </a>
        <a href="https://www.linkedin.com/in/tiago-enriquez-tachy/" target="_blank">
            <img class="icone-grande" src="{{ asset('assets/linkedin.png') }}" alt="Linkedin" title="Meu Linkedin" />
        </a>
    </div>
    <p class="descricao">Eu me chamo Tiago Enriquez Tachy, moro em Salvador, e aprendo a desenvolver softwares desde 2019. Dedico este espaço para apresentação dos principais projetos desenvolvidos por mim.</p>
    
    @if(isset($projetos))

    <h2>Meus Projetos</h2>
    @foreach ($projetos as $projeto)
    <a href="{{ route('mostrar', Str::slug($projeto->nome)) }}">{{ $projeto->nome }}</a>
    @endforeach

    @endif

</main>

@endsection