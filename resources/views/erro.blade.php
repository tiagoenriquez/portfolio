@foreach($errors->all() as $erro)

<section id="erro">
    <p>{{ $erro }}</p>
    <button onclick="fechar()">X</button>
</section>

<script>
    function fechar() {
        const erroElement = document.getElementById("erro");
        erroElement.parentElement.removeChild(erroElement);
    }
</script>

@endforeach