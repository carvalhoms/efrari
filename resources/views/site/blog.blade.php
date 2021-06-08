<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7353eb2283.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url(mix('css/blog/main.css')) }}">
    <title>Blog Efrari | Cabos Flexíveis</title>
</head>
<body>
    <header>
        <div id="header-top">
            <div class="container">
                <a href="mailto:vendas@efrari.com.br" title=""><i class="fas fa-envelope"></i> vendas@efrari.com.br</a>
                <div>
                    <!--<ul>
                        <li><a href="https://www.facebook.com/efrariCabos" target="blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" target="blank"><i class="fab fa-instagram-square"></i></a></li>
                    </ul>-->
                </div>
            </div>
        </div>
        <div id="header-nav">
            <div class="container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Header">
                <p class="titleBlog">Blog Efrari</p>
            </div>
        </div>
    </header>

    <section id="blog">
        <h1 class="animated fadeInUp">Notícias</h1>
        <p class="section-text animated fadeInUp">Acompanhe todas as novidades, comunicados, ofertas, lançamentos e informatívos técnicos da Efrari.</p>
            <div id="content">
                <div class="container">
                    @foreach ($posts as $post)
                    <div class="card">
                        <img src="{{ asset('storage/imagensBlog/'. ($post->img === null ? 'semImg.jpeg' : $post->img)) }}" alt="">
                        <div class="header">{{ $post->title }}</div>
                        <div class="body">{{ $post->subTitle }}</div>
                        <p class="date">Postado: {{ $post->created_at->format('d/m/Y') }}</p>
                        <a class="btn btnWhite" href="#">Leia...</a>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
    
    <footer>
        <div class="container">
            <div>Efrari © 2021</div>
            <a href="https://carvalhoms.com.br" target="blank"><div>by carvalhoms</div></a>
        </div>
    </footer>    
    <script src="{{ url(mix('js/site/main.js')) }}"></script>
</body>
</html>