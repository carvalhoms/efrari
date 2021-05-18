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