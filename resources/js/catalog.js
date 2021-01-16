function onMont() {
    let desc = document.querySelector("#desc");
    if(desc.options[desc.selectedIndex].value != "") {
        let mont = document.querySelector("#mont");
        mont.removeAttribute('disabled');
    }
}

// Filtro Aplicações AJAX
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

function getVeiculo(){
    let mont = document.querySelector("#mont");
    if(mont.options[mont.selectedIndex].value != "") {
        let veic = document.querySelector("#veic");
        veic.removeAttribute('disabled');
    }
    
    let option = mont.options[mont.selectedIndex].value;

    let veic = document.querySelector('#veic');
    veic.innerHTML = "";

    let opDefault = document.createElement('option');
    opDefault.setAttribute('value', '');
    opDefault.innerHTML = 'Selecionar Veículo';
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
}

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

function newCard(data) {
    let products = data.data.map(product => {
        let container = document.querySelector('.resultItens > .container');

        let a = document.createElement('a');
        a.setAttribute('href', '#');
        container.appendChild(a);

        let card = document.createElement('div');
        card.classList.add('card');
        a.appendChild(card);

        let img = document.createElement('div');
        img.classList.add('img');
        card.appendChild(img);

        let image = document.createElement('img');
        image.setAttribute('src', `http://efrari.test/storage/${product.imagem}`);
        image.setAttribute('alt', 'Imagem produto');
        img.appendChild(image);

        let infoProd = document.createElement('div');
        infoProd.classList.add('infoProd');
        card.appendChild(infoProd);

        let pCode = document.createElement('p');
        pCode.classList.add('cardRow','cardCod');
        pCode.innerHTML = product.codigo;

        let pDesc = document.createElement('p');
        pDesc.classList.add('cardRow', 'cardDesc');
        pDesc.innerHTML = product.descricao;

        let pLine = document.createElement('p');
        pLine.classList.add('cardRow', 'cardLinha');
        pLine.innerHTML = product.linha;

        let pDim = document.createElement('p');
        pDim.classList.add('cardRow', 'cardMed');
        pDim.innerHTML = product.comprimento;

        let pMont = document.createElement('p');
        pMont.classList.add('cardRow', 'cardMont');
        pMont.innerHTML = 'Aplicações';

        infoProd.appendChild(pCode);
        infoProd.appendChild(pDesc);
        infoProd.appendChild(pLine);
        infoProd.appendChild(pDim);
        infoProd.appendChild(pMont);

        return a;
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