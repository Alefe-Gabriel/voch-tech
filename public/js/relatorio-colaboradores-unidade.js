let currentPageUnidade;
let totalPagesUnidade;

document.getElementById('unidadeForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const unidadeId = document.getElementById('unidadeId').value;

    fetchDataUnidade(unidadeId);
});

const fetchDataUnidade = async (unidadeId) => {
    const url = `http://localhost:8000/api/colaboradores-por-unidade/${unidadeId}`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Erro na chamada da API: ${response.status}`);
        }
        const data = await response.json();
        displayDataUnidade(data);
    } catch (error) {
        console.error('Erro durante a chamada da API:', error.message);
    }
};

const displayDataUnidade = (data) => {
    const tableElement = document.getElementById('colaboradores-table-unidade');
    const navigationElement = document.getElementById('colaboradores-navigation-unidade');

    // Limpar tabela e navegação
    tableElement.innerHTML = '';
    navigationElement.innerHTML = '';

    if (data && data.content && data.content.data && data.content.data.length > 0) {
        // Preencher tabela
        const headers = ['Nome Fantasia', 'Razão Social', 'CNPJ', 'N° Colaboradores'];
        const table = document.createElement('table');
        table.className = 'table';
        const thead = document.createElement('thead');
        const tbody = document.createElement('tbody');

        const headerRow = document.createElement('tr');
        headers.forEach((header) => {
            const th = document.createElement('th');
            th.textContent = header;
            headerRow.appendChild(th);
        });
        thead.appendChild(headerRow);

        data.content.data.forEach((colaborador) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${colaborador.nome_fantasia}</td>
                <td>${colaborador.razao_social}</td>
                <td>${colaborador.cnpj}</td>
                <td>${colaborador.total_colaboradores}</td>`;
            tbody.appendChild(tr);
        });

        table.appendChild(thead);
        table.appendChild(tbody);
        tableElement.appendChild(table);


        currentPageUnidade = data.content.current_page;
        totalPagesUnidade = data.content.last_page;
        const pageText = document.createElement('p');
        pageText.textContent = `Page ${currentPageUnidade} of ${totalPagesUnidade}`;

        const prevButton = document.createElement('button');
        prevButton.className = 'btn btn-primary mx-3';
        prevButton.textContent = '<';
        prevButton.addEventListener('click', () => backPageUnidade());

        const nextButton = document.createElement('button');
        nextButton.className = 'btn btn-primary mx-3';
        nextButton.textContent = '>';
        nextButton.addEventListener('click', () => nextPageUnidade());

        navigationElement.appendChild(prevButton);
        navigationElement.appendChild(pageText);
        navigationElement.appendChild(nextButton);
    } else {
        console.error('Erro: A resposta da API não contém dados válidos:', data);
    }
};

const backPageUnidade = () => {
    if (currentPageUnidade > 1) {
        currentPageUnidade--;
        fetchDataUnidade(currentPageUnidade);
    }
};

const nextPageUnidade = () => {
    if (currentPageUnidade < totalPagesUnidade) {
        currentPageUnidade++;
        fetchDataUnidade(currentPageUnidade);
    }
};
