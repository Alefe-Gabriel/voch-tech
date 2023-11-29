<div
    class="d-flex flex-column justify-content-center align-items-center"
>
    <h3 class="mb-3">
        Relatório de colaboradores por performance
    </h3>

    <form
        class="d-flex align-items-center my-3"
        id="unidadeForm"
    >
        <label for="unidadeId">ID da Unidade: </label>

        <input
            class="mx-3"
            type="text"
            id="unidadeId"
            name="unidadeId"
            required
        >
        <button class="btn btn-primary" type="submit">Buscar</button>
    </form>

    <div
    id="colaboradores-table-unidade"
    class="table-responsive mx-3"
    >
    </div>
    <div
        id="colaboradores-navigation-unidade"
        class="
            w-100 mt-3 mb-4
            d-flex justify-content-center
        "
    >
    </div>
</div>

<script src="js/relatorio-colaboradores-unidade.js"></script>
