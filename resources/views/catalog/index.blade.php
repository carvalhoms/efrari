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
                <p class="titleCatalog">Catálogo Eletrônico</p>
            </div>
        </div>
    </header>

    <div id="content">
        <section class="filters">
            <div class="container">
                <form action="{{ route('get.code') }}" method="POST">
                    @csrf
                    <div class="rowForm">
                        <input type="text" name="code" id="codEfrari" placeholder="Código Efrari, Número Original ou Referências">
                        <button type="submit" class="btnPesquisar">Pesquisar</a>
                    </div>
                </form>
                <form action="">
                    @csrf
                    <div class="rowForm">
                        <select name="linha" id="linha">
                            <option selected="true" disabled="disabled">Linha</option>
                            <option value="">Leves</option>
                            <option value="">Utilitários</option>
                            <option value="">Pesados</option>
                        </select>
                        
                        <select name="linha" id="linha">
                            <option selected="true" disabled="disabled">Produto</option>
                            <option value="">Selecione 2</option>
                            <option value="">Selecione 3</option>
                        </select>
                        
                        <select name="linha" id="linha">
                            <option selected="true" disabled="disabled">Montadora</option>
                            <option value="">Selecione 2</option>
                            <option value="">Selecione 3</option>
                        </select>
    
                        <select name="linha" id="linha">
                            <option selected="true" disabled="disabled">Veículo</option>
                            <option value="">Selecione 2</option>
                            <option value="">Selecione 3</option>
                        </select>
    
                        <a href="#" class="btnPesquisar">Pesquisar</a>
                    </div>
                </form>
            </div>
        </section>
        <hr>

        <section class="resultItens">
            <div class="container">
                <div class="card">

                </div>

                <div class="card">
                    
                </div>

                <div class="card">
                    
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <div>Efrari Cabos Flexíveis | © 2020 | Todos os direitos reservados</div>
            <div>by carvalhoms</div>
        </div>
    </footer>

    <script src="{{ url(mix('js/site/main.js')) }}"></script>
</body>
</html>