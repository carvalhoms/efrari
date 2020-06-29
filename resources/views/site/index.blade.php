<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7353eb2283.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="{{ url(mix('css/owl.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('css/owl.theme.green.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('css/site/main.css')) }}">
    <title>Efrari | Cabos Flexíveis</title>
</head>
<body>
    <header>
        <div id="header-top">
            <div class="container">
                <a href="mailto:vendas@efrari.com.br" title=""><i class="fas fa-envelope"></i> vendas@efrari.com.br</a>
                <div>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="header-nav">
            <div class="container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Header">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">A Efrari</a></li>
                        <li><a href="#">Catálogos</a></li>
                        <li><a href="#">Produtos</a></li>
                        <li><a href="#">Vendas</a></li>
                        <li><a href="#">Notícias</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </header>

    <section id="slider">

    </section>

    <section id="about">
        <h1 class="section-title title animated fadeInUp">Sobre a Efrari</h1>
        <p class="section-text animated fadeInUp">A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país.  Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
        <img class="imgSobre animated fadeIn" src="{{ asset('images/media.png') }}" alt="Media Image">
    </section>

    <section id="catalog">
        <h1 class="animated fadeInUp">Catálogos Efrari</h1>
        <p class="section-text animated fadeInUp">A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país.  Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
        <div class="catalogLinks">
            <div class="divImage">
                <img class="ilustrativa animated fadeIn" src=" {{ asset('images/media.png ') }}" alt="Media Image">
            </div>
            <div class="links">
                <h2>Escolha as opções abaixo:</h2>
                <p class="box-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, quaerat? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut impedit veritatis vitae iusto voluptas quis ipsam deleniti commodi</p>
                <div class="links-btn">
                    <a href="#" class="btn">Catálogo Online</a>
                    <a href="#" class="btn">Baixar Catálogo (.exe)</a>
                    <a href="#" class="btn">Catálogo Impresso (PDF)</a>
                </div>
                <div class="linksStores">
                    <p class="store-text">Utilize também no celular:</p>
                    <img class="iosStore" src="{{ asset('images/iosStore.png') }}" alt="IOS Store">
                    <img class="andStore" src="{{ asset('images/androidStore.png') }}" alt="Android Store">
                </div>
            </div>
        </div>
    </section>

    <section id="product">
        <h1 class="animated fadeInUp">Linhas de Produtos Efrari</h1>
        <p class="section-text animated fadeInUp">A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país.  Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
        <div class="container">
            <div id="owl-products" class="owl-carousel">
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-001.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Freio de Mão</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-002.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Acelerador</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-003.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Capô</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-004.jpg') }}" alt="Produto 1">
                    <h3>Cabo de Embreagem</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-001.jpg') }}" alt="Produto 1">
                    <h3>Cabo de Engate e Seleção</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
                <div>
                    <img src="{{ asset('images/productLine/linhaProd-003.jpg') }}" alt="Produto 1">
                    <h3>Cabos do Afogador</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, expedita!</p>
                </div>
            </div>
        </div>
        <div class="linhas">
            <div class="leves">
                <h3>Veículos Leves</h3>
                <p>A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país. Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
                <a href="#" class="btn">Saiba mais...</a>
            </div>
            <div class="utilitarios">
                <h3>Veículos Utilitários</h3>
                <p>A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país. Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
                <a href="#" class="btn">Saiba mais...</a>
            </div>
            <div class="pesados">
                <h3>Veículos Pesados / Agrícolas</h3>
                <p>A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país. Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
                <a href="#" class="btn">Saiba mais...</a>
            </div>

        </div>
    </section>

    <section id="sale">
        <h1 class="animate__animated animate__fadeIn">Representantes</h1>
        <p class="section-text animate__animated animate__fadeIn">A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país.  Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
        <div class="container repreDados">
            <div>
                @include('../layouts/_includes/_site/representantes')
            </div>
            <div>
                dados
            </div>
        </div>
    </section>

    <section id="news">
        <h1 class="animated fadeInUp">Notícias</h1>
        <p class="section-text animated fadeInUp">A EFRARI foi fundada há mais de 60 anos motivada pela instalação das primeiras indústrias automotivas no país.  Inicialmente chamava-se E. Frari em razão do seu fundador Emanuelle Frari. Em 1962, a EFRARI foi adquirida pelo Sr. Karl Knudsen que adotou o nome usado até hoje.</p>
        <div class="container">
            <div class="card">
                <div class="img">
                    <img src="{{ asset('images/news/noImg.jpg') }}" alt="Imagem Noticia">
                </div>
                <div class="header">Feira Automec 2019</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum doloremque error labore iusto placeat, vitae delectus ut amet...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn" href="#">Confira...</a>
            </div>
            <div class="card">
                <div class="img">
                    <img src="{{ asset('images/news/noImg.jpg') }}" alt="Imagem Noticia">
                </div>
                <div class="header">Novo Catálogo Efrari</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. At voluptatibus quaerat nam blanditiis unde consequatur non dolorum...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn" href="#">Confira...</a>
            </div>
            <div class="card">
                <div class="img">
                    <img src="{{ asset('images/news/noImg.jpg') }}" alt="Imagem Noticia">
                </div>
                <div class="header">Lançamentos Maio 2019</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, iusto dolor? Sint ab voluptatem voluptatum alias exercitationem...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn" href="#">Confira...</a>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="end">
                a
            </div>
            <div class="contact">
                a
            </div>
            <div class="social">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div>Efrari Cabos Flexíveis | © 2020 | Todos os direitos reservados</div>
            <div>carvalhoms</div>
        </div>
        
    </footer>

    <script src="{{ url(mix('js/jquery.js')) }}"></script>
    <script src="{{ url(mix('js/owl.js')) }}"></script>
    <script src="{{ url(mix('js/site/main.js')) }}"></script>

    <script>


    </script>

</body>
</html>