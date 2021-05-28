<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7353eb2283.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="{{ url(mix('css/catalog/main.css')) }}">
    <title>Efrari | Cabos Flexíveis</title>
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
                <p class="titleCatalog">Blog Efrari</p>
            </div>
        </div>
    </header>

    <div id="content">
        
    </div>
    
    <footer>
        <div class="container">
            <div>Efrari © 2021</div>
            <a href="https://carvalhoms.com.br" target="blank"><div>by carvalhoms</div></a>
        </div>
    </footer>

    <div id="overlay" class="overlay"></div>
    
    <script src="{{ url(mix('js/catalog/main.js')) }}"></script>
</body>
</html>