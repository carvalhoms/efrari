$(document).ready(function(){
    $("#owl-products").owlCarousel({
      items: 3,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      dots: false
    });
});

// Javascript
function ajax(config) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', config.url, true);

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

function getEstado(onclick){
    let ufId = onclick.id;

    let ulRepre = document.querySelector('#represList');
    ulRepre.innerHTML = '';

    ajax({
        url: 'getRepresentantes/' + ufId,
        sucesso(response) {
            let data = JSON.parse(response);
            listaRepre(data);
        },
        erro(e){
            alert('Errooooou!');
        }
    });
}

function listaRepre(data) {
    let repres = data.map(repre => {
        let liRepre = document.createElement('li');
        liRepre.innerHTML = '<div>';
        liRepre.innerHTML += '<p>' + repre.empresa + '</p>';
        liRepre.innerHTML += '<p>' + repre.contato + '</p>';
        liRepre.innerHTML += '<p>' + repre.fone + '</p>';
        liRepre.innerHTML += '<p>' + repre.email + '</p>';
        liRepre.innerHTML += '<p>' + repre.uf + '</p>';
        liRepre.innerHTML += '<p>' + repre.cidade + '</p>';
        liRepre.innerHTML += '<div>';
        liRepre.innerHTML += '<hr>';

        return liRepre;
    });

    let ulRepre = document.querySelector('#represList');
    repres.forEach(repre => ulRepre.appendChild(repre));
}
