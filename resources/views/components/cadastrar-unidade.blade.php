<h3>Cadastrar Unidade</h3>
<br>
<form
    method="POST"
    action="/api/unidades"
>
    <div class="mb-3">
        <label
            for="razao_social"
            class="form-label"
        >
            Razão Social
        </label>
        <input
            type="text"
            class="form-control"
            id="razao_social"
            name="razao_social"
        >
    </div>

    <div class="mb-3">
        <label
            for="nome_fantasia"
            class="form-label"
        >
            Nome Fantasia
        </label>
        <input
            type="text"
            class="form-control"
            id="nome_fantasia"
            name="nome_fantasia"
        >
    </div>

    <div class="mb-3">
        <label
            for="cnpj"
            class="form-label"
        >
            CNPJ
        </label>
        <input
            type="text"
            class="form-control"
            id="cnpj"
            name="cnpj"
        >
    </div>

    <br>

    <button
        type="submit"
        class="btn btn-primary"
    >
        Cadastrar
    </button>
</form>
