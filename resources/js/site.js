// Banner e Carosel
$(document).ready(function() {
  var olwSlider = $('.olw-slider');
  olwSlider.owlCarousel({
      items:1,
      loop:true,
      autoplay:true,
      dotsEach:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      responsiveClass:true,
      animateOut: 'fadeOut',
  });

  olwSlider.on('changed.owl.carousel', function(event) {
    var item = event.item.index - 2;     // Position of the current item
    $('img').removeClass('animate__animated animate__fadeInRight');
    $('.owl-item').not('.cloned').eq(item).find('img').addClass('animate__animated animate__fadeInRight');
  });

  var olwAbout = $('#owl-about');
  olwAbout.owlCarousel({
      items:1,
      loop:true,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
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

// Animação Scroll visibilidade
wow = new WOW(
    {
      animateClass: 'animate__animated',
    }
);
wow.init();

// Animação Nav Fixo
var nav = $('header');
var slider = $('#slider');
var scrolled = false;

$(window).scroll(function () {
    
    if (300 < $(window).scrollTop() && !scrolled) {
        nav.addClass('fixed-top').animate({ top: '0px' });
        slider.addClass('marginNav');
        scrolled = true;
    }

    if (2 > $(window).scrollTop() && scrolled) {
       //animates it out of view
       nav.animate({ top: '-106px' });  
       //sets it back to default style
        setTimeout(function(){
           nav.removeClass('fixed-top');
           slider.removeClass('marginNav');
        },1);
        scrolled = false;
    }
});

// Animação rolagem da página
$('a[href^="#"]').on('click', function(e) {
	e.preventDefault();
	var id = $(this).attr('href'),
			targetOffset = $(id).offset().top;
			
	$('html, body').animate({ 
		scrollTop: targetOffset - 105
	}, 900);
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
            if (data.length == 0) {
                semRepre()
            } else {
                listaRepre(data);
            }
        },
        erro(e){
            alert('Falha na conexão!');
        }
    });
}

function semRepre() {
    let liRepre = document.createElement('li');
    liRepre.classList.add('cardRepre');

    liRepre.innerHTML += '<p>MATRIZ - SÃO BERNARDO DO CAMPO</p>';
    liRepre.innerHTML += '<p><b>Contato:</b> INTERNO</p>';
    liRepre.innerHTML += '<p><b>Fones:</b> +55 11 4176-1700 - 4178-1766</p>';
    liRepre.innerHTML += '<p><b>Cidade:</b> SÃO PAULO - <b>Estado: </b> SP</p>';
    liRepre.innerHTML += '<p><b>Email:</b> vendas@efrari.com.br</p>';

    let ulRepre = document.querySelector('#represList');
    ulRepre.appendChild(liRepre);
}

function listaRepre(data) {
    let repres = data.map(repre => {
        let liRepre = document.createElement('li');
        liRepre.classList.add('cardRepre');

        liRepre.innerHTML += '<p>' + formatText(repre.empresa) + '</p>';
        liRepre.innerHTML += '<p> <b>Contato:</b> ' + formatText(repre.contato) + '</p>';
        liRepre.innerHTML += '<p> <b>Fones:</b> ' + (repre.fone1 ? repre.fone1 : '') + (repre.fone2 ? ' / ' : '') + (repre.fone2 ? repre.fone2 : '') + (repre.fone3 ? ' / ' : '') + (repre.fone3 ? repre.fone3 : '') + (repre.fone4 ? ' / ' : '') + (repre.fone4 ? repre.fone4 : '') + '</p>';
        liRepre.innerHTML += '<p> <b>Cidade:</b> ' + formatText(repre.cidade) + ' - ' + '<b>Estado: </b>' + repre.uf + '</p>';
        liRepre.innerHTML += '<p> <b>Email:</b> ' + repre.email + '</p>';

        return liRepre;
    });

    let ulRepre = document.querySelector('#represList');
    repres.forEach(repre => ulRepre.appendChild(repre));
}

function formatText(str) {
    var subst = str.toLowerCase().replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
    return subst;
}