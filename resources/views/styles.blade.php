<style>
    :root {
        --amarelo: rgb(237, 237, 46);
        --azul-muito-escuro: rgb(31, 36, 46);
        --azul-escuro: rgb(62, 71, 91);
        --azul-pouco-escuro: rgb(93, 106, 136);
        --azul: rgb(123, 141, 181);
        --azul-pouco-claro: rgb(156, 170, 200);
        --azul-claro: rgb(189, 198, 218);
        --azul-muito-claro: rgb(222, 227, 237);
        --ameaca: rgb(222, 36, 46);
        --altura: 32px;
        --familia_da_fonte: serif;
        --margem_grande: 8px 8px 8px 8px;
        --margem_para_texto: 4px 8px  4px 8px;
        --tamanho_da_fonte: 16px;
    }

    a {
        text-decoration: none;
        color: var(--amarelo);
        font-family: var(--familia_da_fonte);
        font-size: var(--tamanho_da_fonte);
        margin: (var(--margem_grande));
        padding: var(--margem_grande);
    }

    a:hover {
        background-color: var(--azul-escuro);
    }

    a:active {
        background-color: var(--azul-pouco-escuro);
    }

    body {
        background-color: var(--azul);
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    button, input, label p {
        font-family: var(--familia_da_fonte);
        font-size: var(--tamanho_da_fonte);
        height: var(--altura);
        margin: var(--margem_grande);
    }

    button {
        background-color: var(--azul-muito-escuro);
        border: none;
        color: var(--amarelo);
        padding: var(--margem_para_texto);
    }

    button:hover {
        background-color: var(--azul-escuro);
    }

    button:active {
        background-color: var(--azul-pouco-escuro);
    }

    form, main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1, h2 {
        font-family: var(--familia_da_fonte);
        text-align: center;
    }

    header {
        height: 64px;
    }

    input {
        font-family: var(--familia_da_fonte);
        font-size: var(--tamanho_da_fonte);
        height: 32px;
        margin: var(--margem_grande);
        width: 256px;
    }

    label {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: var(--margem_grande);
        text-align: right;
        width: 256px;
    }

    main {
        min-height: 100vh;
        min-width: 100vw;
    }

    nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        background-color: var(--azul-muito-escuro);
    }

    p {
        padding: var(--margem_grande);
        text-align: justify;
    }

    table {
        margin: var(--margem_grande);
        padding: var(--margem_grande);
    }

    thead tr td {
        background-color: var(--azul-claro);
        color: black;
    }

    tbody tr {
        background-color: white;
        color: black;
    }

    tbody tr:hover {
        background-color: var(--azul-muito-claro);
    }

    td {
        font-family: var(--familia_da_fonte);
        font-size: var(--tamanho-da-fonte);
        margin: var(--margem-pequena);
        padding: var(--margem_para_texto);
        text-align: center;
    }
    
    textarea {
        font-family: var(--familia_da_fonte);
        font-size: var(--tamanho_da_fonte);
        margin: var(--margem_grande);
    }

    .buttons {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .campo-de-digitacao {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .descricao {
        max-width: 25%;
    }

    .foto {
        height: 256px;
        width: auto;
        padding: var(--margem_grande);
    }

    .icone {
        height: 24px;
        width: auto;
        margin: 0;
        padding: 0;
    }

    .icone-grande {
        height: 32px;
        width: auto;
        margin: 0;
        padding: 0;
    }

    .label-de-imagem {
        cursor: pointer;
    }

    #erro {
        display: flex;
        flex-direction: row;
        align-items: center;
        background-color: var(--ameaca);
        color: var(--amarelo);
        padding: var(--margem_para_texto);
        justify-content: space-between;
    }

    #imagem {
        display: none;
    }

    @media screen and (width <= 640px) {
        .descricao {
            max-width: 100%;
            padding: var(--margem_grande);
        }
    }

    @media screen and (width <= 520px) {
        .foto {
            width: 90%;
            height: auto;
            padding: var(--margem_grande);
        }
    }
</style>