<h3>Cadastrar um novo Colaborador</h3>
<br>
<form
    method="POST"
    action="/api/colaboradores"
>
    @csrf
    <div class="mb-3">
        <label
            for="unidade_id"
            class="form-label"
        >
            ID da Unidade
        </label>
        <input
            type="text"
            class="form-control"
            id="unidade_id"
            name="unidade_id"
        >
    </div>

    <div class="mb-3">
        <label
            for="nome"
            class="form-label"
        >
            Nome
        </label>
        <input
            type="text"
            class="form-control"
            id="nome"
            name="nome"
        >
    </div>

    <div class="mb-3">
        <label
            for="cpf"
            class="form-label"
        >
            CPF
        </label>
        <input
            type="text"
            class="form-control"
            id="cpf"
            name="cpf"
        >
    </div>

    <div class="mb-3">
        <label
            for="email"
            class="form-label"
        >
            Email
        </label>
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
        >
    </div>


    <div class="mb-3">
        <label
            for="cargo_id"
            class="form-label"
        >
            ID Cargo
        </label>
        <input
            type="cargo_id"
            class="form-control"
            id="cargo_id"
            name="cargo_id"
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

<hr>
<br>
<h3>Desempenho do colaborador</h3>
<br>
<form
    method="POST"
    action="/api/nota-colaborador"
>
    <div class="mb-3">
        <label for="colaborador_id" class="form-label">ID do Colaborador</label>
        <input type="text" class="form-control" id="colaborador_id" name="colaborador_id">
    </div>

    <div class="mb-3">
        <label for="cargo_id" class="form-label">ID Cargo</label>
        <input type="text" class="form-control" id="cargo_id" name="cargo_id">
    </div>

    <div class="mb-3">
        <label for="nota_desempenho" class="form-label">Nota Desempenho</label>
        <input type="number" class="form-control" id="nota_desempenho" name="nota_desempenho">
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
<br>
