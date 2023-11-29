let currentPagePerformance;
let totalPagesPerformance;

const fetchDataPerformance = async (page) => {
    let url = 'http://localhost:8000/api/colaboradores-por-performance'
    !page ? url = url : url = `${url}?pagina=${page}`;

    console.log(url)
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Erro na chamada da API: ${response.status}`);
        }
        const data = await response.json();
        displayDataPerformance(data);
    } catch (error) {
        console.error('Erro durante a chamada da API:', error.message);
    }
};

const displayDataPerformance = (data) => {
    const tableElement = document.getElementById('colaboradores-table-performance');
    const navigationElement = document.getElementById('colaboradores-navigation-performance');

    // Limpar tabela e navegação
    tableElement.innerHTML = '';
    navigationElement.innerHTML = '';

    if (data && data.content && data.content.data && data.content.data.length > 0) {
        // Preencher tabela
        const headers = ['Nome', 'CPF', 'Email', 'Unidade', 'Cargo', 'Nota de Desempenho'];
        const table = document.createElement('table');
        table.className = 'table'
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
                <td>${colaborador.nome}</td>
                <td>${colaborador.cpf}</td>
                <td>${colaborador.email}</td>
                <td>${colaborador.unidade}</td>
                <td>${colaborador.cargo}</td>
                <td>${colaborador.nota_desempenho}</td>`;
        tbody.appendChild(tr);
    });

    table.appendChild(thead);
    table.appendChild(tbody);
    tableElement.appendChild(table);

    // Preencher navegação
    currentPagePerformance = data.content.current_page;
    totalPagesPerformance = data.content.last_page;

    const pageText = document.createElement('p');
    pageText.textContent = `Page ${currentPagePerformance} of ${totalPagesPerformance}`;

    const prevButton = document.createElement('button');
    prevButton.className = 'btn btn-primary mx-3';
    prevButton.textContent = '<';
    prevButton.addEventListener('click', () => backPagePerformance());

    const nextButton = document.createElement('button');
    nextButton.className = 'btn btn-primary mx-3';
    nextButton.textContent = '>';
    nextButton.addEventListener('click', () => nextPagePerformance());

    navigationElement.appendChild(prevButton);
    navigationElement.appendChild(pageText);
    navigationElement.appendChild(nextButton);
    } else {
        console.error('Erro: A resposta da API não contém dados válidos:', data);
    }
};

const backPagePerformance = () => {
    if (currentPagePerformance > 1) {
        currentPagePerformance--;
        fetchDataPerformance(currentPagePerformance);
    }
};

const nextPagePerformance = () => {
    if (currentPagePerformance < totalPagesPerformance) {
        currentPagePerformance++;
        fetchDataPerformance(currentPagePerformance);
    }
};


fetchDataPerformance();
