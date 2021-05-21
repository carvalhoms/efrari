<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7353eb2283.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="{{ url(mix('css/site/main.css')) }}">
    <title>Efrari | Cabos Flexíveis</title>
</head>
<body>
    <header style="top: -110px;">
        <div id="header-top">
            <div class="container">
                <a href="mailto:vendas@efrari.com.br" title=""><i class="fas fa-envelope"></i> vendas@efrari.com.br</a>
                <div>
                    <ul>
                        <li><a href="https://www.facebook.com/efrariCabos" target="blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" target="blank"><i class="fab fa-instagram-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="header-nav">
            <div class="container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Header">
                <nav>
                    <ul>
                        <li><a href="#slider">Home</a></li>
                        <li><a href="#about">A Efrari</a></li>
                        <li><a href="#catalog">Catálogos</a></li>
                        <li><a href="#product">Produtos</a></li>
                        <li><a href="#sale">Vendas</a></li>
                        <li><a href="#news">Notícias</a></li>
                        <li><a href="#footer">Contato</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section id="slider">
        <div class="owl-carousel owl-theme olw-slider">
            <div class="item" style="background-image: url( {{ asset('images/slider/001.jpg') }} );">
                <div class="container">
                    <div class="contentText">
                        <h2>Catálogos Efrari</h2>
                        <p>Confira todos os Catálogos Efrari disponíveis para consulta en vários formatos. Impresso, Online, Offline e Aplicativos Móveis</p>
                        <a href="#catalog"><button>Saiba mais...</button></a>
                    </div>
                    <div class="contentImage">
                        <img class="animate__animated animate__fadeInRight" src="{{ asset('images/media.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url( {{ asset('images/slider/002.jpg') }} );">
                <div class="container">
                    <div class="contentText">
                        <h2>Qualidade Garantida</h2>
                        <p>Garantimos a qualidade dos produtos que é atestada pelos padrões mais rigorosos do mercado.</p>
                        <a href="#about"><button>Saiba mais...</button></a>
                    </div>
                    <div class="contentImage">
                        <img src="{{ asset('images/pecas3d.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <h1 class="section-title title animated fadeInUp">Sobre a Efrari</h1>
        <p class="section-text bold animated fadeInUp">Fundada nos anos 50, a Efrari produz cabos flexíveis para as principais indústrias automotivas do país, bem como para os diversificados mercados de reposição e exportação.</p>
        <div class="container">
            <div class="section-text-about">
                <div>
                    <p class="section-text animated fadeInUp">Neste período, temos trabalhado para manter a excelência em nossa linha de produtos, reconhecida como uma das mais amplas do segmento, e no atendimento ao cliente, adequando nossos padrões à evolução do mercado, algo especialmente notório nos últimos anos.</p>
                    <p class="section-text animated fadeInUp">Para tanto, realizamos investimentos contínuos em novos processos de fabricação e na educação e valorização de nossos colaboradores, sempre com a visão de que a satisfação do cliente é o nosso objetivo maior.</p>
                </div>
                <div class="certificado">
                    <span>Certificado ISO 9001</span>
                    <img src="{{ asset('images/certificadoEfrari.png') }}" alt="Certificado">
                </div>
            </div>
            <div class="section-img-area">
                <div>
                    <div id="owl-about" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('images/about/about01.jpg') }}" alt="Efrari">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/about/about02.jpg') }}" alt="Efrari">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/about/about03.jpg') }}" alt="Efrari">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/about/about04.jpg') }}" alt="Efrari">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/about/about05.jpg') }}" alt="Efrari">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/about/about06.jpg') }}" alt="Efrari">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mvv">
            <div class="missao">
                <h3>Atendimento</h3>
                <p>Contamos com uma equipe de especialistas treinados para atender com eficiência e agilidade. Você pode contar com nossa equipe interna e também com nossos representantes em todo país.</p>
            </div>

            <div class="visao">
                <h3>Rede de distribuição</h3>
                <p>A Efrari trabalha desde os anos 50 com o objetivo de levar excelencia e qualidade para todos os consumidores. Ao longo dessa trajetória consquistamos e formamos diversas parcerias em todo Brasil.</p>
            </div>

            <div class="valores">
                <h3>Garantia e Qualidade</h3>
                <p>Pesquisa, tecnologia e controle de qualidade para entregar produtos seguros e confiáveis. Trabalhamos para garantir a qualidade do produto respeitando rigorosos controles de qualidade.</p>
            </div>
        </div>
    </section>

    <section id="catalog">
        <h1 class="animated fadeInUp">Catálogos Efrari</h1>
        <p class="section-text animated fadeInUp">Disponibilizamos a consulta dos produtos Efrari em diversas mídias. Sempre atualizados com informações técnicas de aplicações revisadas de fácil localização e entendimento os Catálogos Efrari estão a disposição, sem qualquer travas para facilitar o uso e pesquisa de produtos.</p>
        <div class="catalogLinks">
            <div class="divImage">
                <img class="ilustrativa animated fadeIn" src=" {{ asset('images/media.png ') }}" alt="Media Image">
            </div>
            <div class="links">
                <h2>Escolha as opções abaixo:</h2>
                <p class="box-text">Consulte a melhor forma de obter suporte e informações dos Produtos Efrari, seja com o Catálogo Impresso ou alguma das opções digitais disponíveis com consultas online ou offline:</p>
                <div class="links-btn">
                    <a href="{{ route('catalog.index') }}" class="btn" target="blank">Catálogo Online</a>
                    <a href="https://baixecatalogo.com.br/catalogo/25" class="btn" target="blank">Baixar Catálogo (.exe)</a>
                    <a href="{{ asset('/storage/catalogs/catalogoEfrari2019.pdf') }}" class="btn" target="blank">Catálogo Impresso (PDF)</a>
                </div>
                <div class="linksStores">
                    <div>
                        <p class="store-text">Utilize também no celular:</p>
                    </div>
                    <div>
                        <img class="iosStore" src="{{ asset('images/iosStore.png') }}" alt="IOS Store">
                        <img class="andStore" src="{{ asset('images/androidStore.png') }}" alt="Android Store">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="product">
        <h1 class="animated fadeInUp">Linha de Produtos</h1>
        <p class="section-text animated fadeInUp">A Efrari possui um portifólio completo de produtos para todas as montadoras e veículos nacionais e importadas. Desde veúculos antigos até os novos modelos recem lançados no mercado para toda a linha de veículos, desde laves, utilitários, pesados e agrícolas.</p>
        <div class="container">
            <div id="owl-products" class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-001.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Freio de Mão</h3>
                </div>
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-002.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Acelerador</h3>
                </div>
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-003.jpg') }}" alt="Produto 1">
                    <h3>Cabos de Capô</h3>
                </div>
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-004.jpg') }}" alt="Produto 1">
                    <h3>Cabo de Embreagem</h3>
                </div>
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-001.jpg') }}" alt="Produto 1">
                    <h3>Cabo de Engate e Seleção</h3>
                </div>
                <div class="item">
                    <img src="{{ asset('images/productLine/linhaProd-003.jpg') }}" alt="Produto 1">
                    <h3>Cabos do Afogador</h3>
                </div>
            </div>
        </div>
        <div class="linhas">
            <div class="leves">
                <img src="{{ asset('images/line/leve.png') }}" alt="Linha Leve">
                <h3>Veículos Leves</h3>
            </div>

            <div class="utilitarios">
                <img src="{{ asset('images/line/utilitario.png') }}" alt="Linha Utilitários">
                <h3>Veículos Utilitários</h3>
            </div>

            <div class="pesados">
                <img src="{{ asset('images/line/pesado.png') }}" alt="Linha Pesada">
                <h3>Veículos Pesados</h3>
            </div>

            <div class="agricolas">
                <img src="{{ asset('images/line/agricola.png') }}" alt="Linha Agrícola">
                <h3>Máquinas Agrícolas</h3>
            </div>
        </div>
    </section>

    <section id="sale">
        <h1 class="animate__animated animate__fadeIn">Representantes</h1>
        <p class="section-text animate__animated animate__fadeIn">Equipe de vendas qualificada e preparada para atender com velocidade e eficiência em todos os estados do Brasil. Consulte nossos representantes em seu estado ou fale com a equipe da Matriz em São Paulo.</p>
        <div class="container repreDados">
            <div>
                @include('../layouts/_includes/_site/representantes')
            </div>
            <div>
                <h2>Representantes:</h2>
                <p class="pRepreDados animate__animated animate__fadeIn">Entre em contato com um representante Efrari.</p>
                <ul id="represList">
                </ul>
            </div>
        </div>
    </section>

    <section id="newsletter">
        <div class="container">
            <div>
                <p>Cadastre-se e receba os Informativos Efrari</p>
            </div>
            <div>
                <form method="post" action="{{ route('newsletter.store') }}">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Cadastre seu email" name="email" id="newsletterContato">
                    <button type="submit" class="btnNewsletterContato">Cadastre</button>
                </form>
            </div>
        </div>
    </section>

    <section id="news">
        <h1 class="animated fadeInUp">Blog Efrari</h1>
        <p class="section-text animated fadeInUp">Acompanhe todas as novidades, comunicados, ofertas, lançamentos e informatívos técnicos da Efrari.<br>Consulte o Blog e fique sempre por dentro de tudo que preparamos especialemte para você.</p>
        <div class="container">
            <div class="card">
                <img src="images/news/noImg.jpg" alt="Post">
                <div class="header">Feira Automec 2019</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum doloremque error labore iusto placeat, vitae delectus ut amet...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn btnWhite" href="#">Leia...</a>
            </div>

            <div class="card">
                <img src="images/news/noImg.jpg" alt="Post">
                <div class="header">Novo Catálogo Efrari</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. At voluptatibus quaerat nam blanditiis unde consequatur non dolorum...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn btnWhite" href="#">Leia...</a>
            </div>

            <div class="card">
                <img src="images/news/noImg.jpg" alt="Post">
                <div class="header">Lançamentos Maio 2019</div>
                <div class="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, iusto dolor? Sint ab voluptatem voluptatum alias exercitationem...</div>
                <div class="date">Publicado: 18/05/2020</div>
                <a class="btn btnWhite" href="#">Leia...</a>
            </div>
        </div>
        <div class="container">
            <a href="#" class="btn btnBlog">Saiba mais...</a>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="end">
                <h4>Efrari Cabos flexíveis para veículos.</h4>
                <p>Rua China, 217 - Cep 09672-100</p>
                <p>São Bernardo do Campo - SP - Brasil</p>
            </div>
            <div class="contact">
                <h4>Fone: +55 11 4176-1700 - 4178-1766</h4>
                <p>email: vendas@efrari.com.br</p>
                <form method="post" action="{{ route('newsletter.store') }}">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Cadastre seu email" name="email" id="newsletterContato">
                    <button type="submit" class="btnNewsletterContato">Cadastre</button>
                </form>
            </div>
            <div class="social">
                <ul>
                    <li><a href="https://www.facebook.com/efrariCabos" target="blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" target="blank"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#" target="blank"><i class="fab fa-instagram-square"></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div>Efrari © 2021</div>
            <div>by carvalhoms</div>
        </div>
        
    </footer>

    <script src="{{ url(mix('js/site/main.js')) }}"></script>

</body>
</html>