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

function productView() {
    
}