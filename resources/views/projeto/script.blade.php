<script>
    /**
     * @param {Event} event
     */
    function escreverImagem(event) {
        /**
         * @type {HTMLInputElement}
         * */
        const urlDaImagemInput = document.getElementById("url_da_imagem");

        urlDaImagemInput.value = URL.createObjectURL(event.target.files[0]);
    }

    function selecionarCampoDescricao() {
        /**
         * @type {HTMLTextAreaElement}
         */
        const descricaoElement = document.getElementById("descricao");

        descricaoElement.select();
    }
</script>