// Função AJAX
function ajax(config) {
    let xhr = new XMLHttpRequest();
    xhr.open(config.method, config.url, true);

    xhr.onload = e => {
        if(xhr.status === 200) {
            config.sucesso(xhr.response);
        } else if(xhr.status >= 400) {
            config.erro({
                codigo: xhr.status,
                texto: xhr.statusText
            });
        }
    }

    xhr.send();
}

// Abilita select Linhas
function onLinha() {
    let desc = document.querySelector("#desc");

    if(desc.options[desc.selectedIndex].value != "") {
        let linha = document.querySelector("#linha");
        linha.removeAttribute('disabled');
    }
}

// Select Montadoras
function getMont() {
    let linha = document.querySelector('#linha');
    if(linha.options[linha.selectedIndex].value != "") {
        let mont = document.querySelector("#mont");
        mont.removeAttribute('disabled');
    }

    let option = linha.options[linha.selectedIndex].value;
    let mont = document.querySelector('#mont')
    mont.innerHTML = "";

    let veic = document.querySelector('#veic')
    veic.setAttribute('disabled', 'disabled');
    veic.innerHTML = "";

    let opDefault = document.createElement('option');
    opDefault.setAttribute('value', '');
    opDefault.innerHTML = 'Montadora';
    mont.appendChild(opDefault);    

    opDefault = document.createElement('option');
    opDefault.setAttribute('value', '');
    opDefault.innerHTML = 'Veiculo';
    veic.appendChild(opDefault);

    ajax({
        method: 'GET',
        url: 'api/catalogo/getMontadora/' + option,
        sucesso(response) {
            let data = JSON.parse(response);

            listMontadoras(data);
        },
        erro(e){
            alert('Erro!');
        }
    });

    function listMontadoras(data) {
        let montadoras = data.map(montadora => {
            let option = document.createElement('option');
            option.setAttribute('value', montadora.id);
            option.innerHTML = montadora.name;
    
            return option;
        });
    
        let select = document.querySelector('#mont');
        montadoras.forEach(montadora => select.appendChild(montadora));
    }
}

// Select Veículos
function getVeiculo(){
    let mont = document.querySelector('#mont');
    if(mont.options[mont.selectedIndex].value != "") {
        let veic = document.querySelector("#veic");
        veic.removeAttribute('disabled');
    }

    let option = mont.options[mont.selectedIndex].value;
    
    let veic = document.querySelector('#veic')
    veic.innerHTML = "";

    let opDefault = document.createElement('option');
    opDefault.setAttribute('value', '');
    opDefault.innerHTML = 'Veiculo';
    veic.appendChild(opDefault);

    ajax({
        url: 'api/catalogo/getVeiculo/' + option,
        method: 'GET',
        sucesso(response) {
            let data = JSON.parse(response);

            listVeiculos(data);
        },
        erro(e){
            alert('Erro!');
        }
    });

    function listVeiculos(data) {
        let veiculos = data.map(veiculo => {
            let option = document.createElement('option');
            option.setAttribute('value', veiculo.name);
            option.innerHTML = veiculo.name;
    
            return option;
        });
    
        let select = document.querySelector('#veic');
        veiculos.forEach(veiculo => select.appendChild(veiculo));
    }
}

// Pesquisa por código
const codeForm = document.querySelector('#codeForm');
codeForm.addEventListener('submit', function(e) {
    e.preventDefault();
    getCode();
});

function getCode() {

    let container = document.querySelector('.resultItens > .container');
    container.innerHTML = '';
    
    let dataCode = document.querySelector('#codEfrari').value;

    ajax({
        url: 'api/catalogo/code/search/' + dataCode,
        method: 'GET',
        sucesso(response) {
            let data = JSON.parse(response);
            data.data.length > 0 ? newCard(data) : noCard();
        },
        erro(e){
            alert('Erro!');
        }
    });
}

// Pesquisa por aplicação
const aplicForm = document.querySelector('#aplicForm');
aplicForm.addEventListener('submit', function(e) {
    e.preventDefault();
    getAplic();
});

function getAplic() {
    let container = document.querySelector('.resultItens > .container');
    container.innerHTML = '';

    let descCode = document.querySelector('#desc').value;
    descCode = desc.options[desc.selectedIndex].value;

    let montCode = document.querySelector('#mont').value;
    montCode = mont.options[mont.selectedIndex].value;
    
    let veicCode = document.querySelector('#veic').value;
    veicCode = veic.options[veic.selectedIndex].value;

    ajax({
        url: 'api/catalogo/aplic/search/' + descCode + '/' + montCode + '/' + veicCode,
        method: 'GET',
        sucesso(response) {
            let data = JSON.parse(response);
            data.data.length > 0 ? newCard(data) : noCard();
        },
        erro(e){
            alert('Erro!');
        }
    });
}


/*
|--------------------------------------------------------------------------
|  MONTA CARDS COM RESULTADOS
|--------------------------------------------------------------------------
|
| Lista cards com produtos encontrados ou "Nenhum produto encontrado!"
|
*/

function newCard(data) {
    let products = data.data.map(product => {
        let container = document.querySelector('.resultItens > .container');

        let card = document.createElement('div');
        card.classList.add('card');
        card.onclick = function () {
            getProductView(product.codigo);
        }
        container.appendChild(card);

        let img = document.createElement('div');
        img.classList.add('img');
        card.appendChild(img);

        let image = document.createElement('img');
        image.setAttribute('src', `http://efrari.test/storage/produtosImg/${product.imagem}`);
        image.setAttribute('alt', 'Imagem produto');
        img.appendChild(image);

        let infoProd = document.createElement('div');
        infoProd.classList.add('infoProd');
        card.appendChild(infoProd);

        let pCode = document.createElement('p');
        pCode.classList.add('cardRow','cardCod');
        pCode.innerHTML = '<span>Código: </span>' + product.codigo;

        let pDesc = document.createElement('p');
        pDesc.classList.add('cardRow', 'cardDesc');
        pDesc.innerHTML = '<span>Produto: </span>' + product.descricao;

        let pLine = document.createElement('p');
        pLine.classList.add('cardRow', 'cardLinha');
        pLine.innerHTML = '<span>Linha: </span>' + product.aplicacoes[0]['linha'];

        let pDim = document.createElement('p');
        pDim.classList.add('cardRow', 'cardMed');
        pDim.innerHTML = '<span>Comprimento: </span>' + product.comprimento + 'mm';

        let rAplic = document.createElement('p');
        rAplic.classList.add('cardRow', 'cardMont');
        rAplic.innerHTML = '<span>Resumo aplicação: </span>' + product.aplicacoes[0]['aplicacao'] + '...';

        infoProd.appendChild(pCode);
        infoProd.appendChild(pDesc);
        infoProd.appendChild(pLine);
        infoProd.appendChild(pDim);
        infoProd.appendChild(rAplic);

        return card;
    })

    let containerProducts = document.querySelector('.resultItens > .container');
    products.forEach(product => containerProducts.appendChild(product));
}

function noCard() {
    let noCard = document.createElement('p');
    noCard.classList.add('noCard');
    noCard.innerHTML = 'Nenhum produto encontrado!';
    
    let containerProducts = document.querySelector('.resultItens > .container');
    containerProducts.appendChild(noCard);
}

function getProductView(cod) {
    let codigo = cod;

    ajax({
        url: 'api/catalogo/code/search/' + codigo,
        method: 'GET',
        sucesso(response) {
            let data = JSON.parse(response);
            productView(data);
        },
        erro(e){
            alert('Erro!');
        }
    });
}

function productView(data) {
    let overlay = document.querySelector('#overlay');
    let modalProd = document.createElement('div');
    modalProd.classList.add('modalProd');
    modalProd.setAttribute('id', 'modalProd');
    overlay.appendChild(modalProd);

    let content = document.createElement('div');
    content.classList.add('content');
    modalProd.appendChild(content);

    let imgArea = document.createElement('div');
    imgArea.classList.add('img');
    let img = document.createElement('img');
    img.setAttribute('src', `http://efrari.test/storage/produtosImg/${data.data[0]['imagem']}`);
    imgArea.appendChild(img);
    content.appendChild(imgArea);

    let header = document.createElement('div');
    header.classList.add('header');
    header.innerHTML = `
            <svg version="1.1" class="closeBtn" id="Layer_1" onclick="btnModalClose()" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2 2" style="enable-background:new 0 0 2 2;" xml:space="preserve">
                <g><path d="M1.98,1.98L1.98,1.98c-0.03,0.03-0.08,0.03-0.11,0L0.02,0.13c-0.03-0.03-0.03-0.08,0-0.11l0,0c0.03-0.03,0.08-0.03,0.11,0l1.84,1.84C2.01,1.9,2.01,1.95,1.98,1.98z"/></g>
                <g><path d="M0.02,1.98L0.02,1.98c-0.03-0.03-0.03-0.08,0-0.11l1.84-1.84c0.03-0.03,0.08-0.03,0.11,0l0,0c0.03,0.03,0.03,0.08,0,0.11L0.13,1.98C0.1,2.01,0.05,2.01,0.02,1.98z"/></g>
            </svg>
        `;
        content.appendChild(header);

    let cod = document.createElement('div');
    cod.classList.add('cod');
    cod.innerHTML = `
        <p class="legenda">Código Efrari:</p>
        <p class="codigo">${data.data[0]['codigo']}</p>
    `;
    content.appendChild(cod);

    let desc = document.createElement('div');
    desc.classList.add('desc');
    desc.innerHTML = `
        <p class="legenda">Descrição Produto:</p>
        <p class="descricao">${data.data[0]['descricao']}</p>
    `;
    content.appendChild(desc);

    let med = document.createElement('div');
    med.classList.add('med');
    med.innerHTML = `
        <p class="legenda">Medidas:</p>
        <p class="medidas">${data.data[0]['comprimento']}</p>
    `;
    content.appendChild(med);

    let ref = document.createElement('div');
    ref.classList.add('ref');
    legenda = document.createElement('p');
    legenda.classList.add('legenda');
    legenda.innerHTML = 'referências:';
    let refs = document.createElement('div');
    refs.classList.add('refs');
    let table = document.createElement('table');
    table.classList.add('table');

    let tr = document.createElement('tr');
    let marca = document.createElement('th');
    marca.innerHTML = 'Marca';
    let referencia = document.createElement('th');
    referencia.innerHTML = 'Referencia';
    
    ref.appendChild(legenda);
    ref.appendChild(refs);
    refs.appendChild(table);
    content.appendChild(ref);
    tr.appendChild(referencia);
    tr.appendChild(marca);
    table.appendChild(tr);

    let dataRefs = data.data[0]['referencias'];
    let refList = dataRefs.map(refItem => {
        let tr = document.createElement('tr');
        let referencia = document.createElement('td');
        let marca = document.createElement('td');
        referencia.innerHTML = refItem.referencia;
        marca.innerHTML = refItem.marca;
        tr.appendChild(referencia);
        tr.appendChild(marca);

        return tr;
    });

    let tableRef = document.querySelector('.refs > .table');
    refList.forEach(refItem => tableRef.appendChild(refItem));


    let aplic = document.createElement('div');
    aplic.classList.add('aplic');
    let aplics = document.createElement('div');
    aplics.classList.add('aplics');
    legenda = document.createElement('p');
    legenda.classList.add('legenda');
    legenda.innerHTML = 'referências:';
    table = document.createElement('table');
    table.classList.add('table');

    tr = document.createElement('tr');
    let linha = document.createElement('th');
    linha.innerHTML = 'Linha';
    let montadora = document.createElement('th');
    montadora.innerHTML = 'Montadora';
    let aplicHeadder = document.createElement('th');
    aplicHeadder.innerHTML = 'Aplicação';

    tr.appendChild(linha);
    tr.appendChild(montadora);
    tr.appendChild(aplicHeadder);
    table.appendChild(tr);

    aplics.appendChild(legenda);
    aplics.appendChild(table);
    aplic.appendChild(aplics);

    modalProd.appendChild(aplic);

    let dataAplics = data.data[0]['aplicacoes'];
    aplicList = dataAplics.map( aplicItem => {
        let tr = document.createElement('tr');
        linha = document.createElement('td');
        montadora = document.createElement('td');
        aplic = document.createElement('td');
        linha.innerHTML = aplicItem.linha;
        montadora.innerHTML = aplicItem.montadora;
        aplic.innerHTML = aplicItem.aplicacao;
        tr.appendChild(linha);
        tr.appendChild(montadora);
        tr.appendChild(aplic);

        return tr;
    });

    let tableAplic = document.querySelector('.aplics > .table');
    aplicList.forEach(aplicItem => tableAplic.appendChild(aplicItem));

    openModal();
}

const openModal = () => {
    let overlay = document.getElementById("overlay");
    let modalProd = document.getElementById("modalProd");
    overlay.style.display = 'flex';
    modalProd.style.display = 'flex';
    setTimeout(() => { document.addEventListener('click', handleClickOutside, false) }, 200);
}

const handleClickOutside = (event) => {
    let overlay = document.getElementById("overlay");
    let modalProd = document.getElementById("modalProd");
    if (!modalProd.contains(event.target)) {
        modalProd.style.display = 'none';
        overlay.style.display = 'none';
        document.removeEventListener('click', handleClickOutside, false);
        overlay.innerHTML = '';
    }
}

const btnModalClose = () => {
    modalProd.style.display = 'none';
    overlay.style.display = 'none';
    document.removeEventListener('click', handleClickOutside, false);
    overlay.innerHTML = '';
}