// Banner e Carosel
$(document).ready(function() {
  var olwSlide = $('.olw-slider');
  olwSlide.owlCarousel({
      items:1,
      loop:true,
      autoplay:true,
      dotsEach:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      responsiveClass:true,
      animateOut: 'fadeOut',
  });

  var owlProducts = $('#owl-products');
  owlProducts.owlCarousel({
      loop:true,
      autoplay:true,
      dotsEach:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsiveClass:true,
      responsive: {
          0: {
              items: 1
          },
          1000: {
              items: 2
          },
          1200: {
              items: 3
          }
      }
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
        url: 'getRepre/' + ufId,
        sucesso(response) {
            let data = JSON.parse(response);
            listaRepre(data);
        },
        erro(e){
            alert('Falha na conexão!');
        }
    });
}

function listaRepre(data) {
    let repres = data.map(repre => {
        let liRepre = document.createElement('li');
        liRepre.classList.add('cardRepre');

        liRepre.innerHTML += '<p>' + repre.empresa + '</p>';
        liRepre.innerHTML += '<p>' + repre.contato + '</p>';
        liRepre.innerHTML += '<p>' + repre.fone1 + '</p>';
        liRepre.innerHTML += '<p>' + repre.cidade + '</p>';
        liRepre.innerHTML += '<p>' + repre.email + '</p>';

        return liRepre;
    });

    let ulRepre = document.querySelector('#represList');
    repres.forEach(repre => ulRepre.appendChild(repre));
}