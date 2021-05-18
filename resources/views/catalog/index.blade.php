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
                <p class="titleCatalog">Catálogo Online</p>
            </div>
        </div>
    </header>

    <div id="content">
        <section class="filters">
            <div class="container">
                <form id="codeForm">
                    <div class="rowForm">
                        <input type="text" name="code" id="codEfrari" placeholder="Pesquisa por Código EFRARI, Número Original ou Referência" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pesquisa por Código EFRARI, Número Original ou Referência'" required>
                        <button type="submit" class="btnPesquisar">Pesquisar</button>
                    </div>
                </form>
                <form id="aplicForm">
                    <div class="rowForm">
                        <select name="desc" id="desc" onchange="onLinha()" required>
                            <option value="" selected="true" disabled="disabled">Produto</option>
                            @foreach ($descricoes as $descricao)
                                <option value="{{ $descricao->id }}">{{ $descricao->name }}</option>
                            @endforeach
                        </select>

                        <select name="linha" id="linha" onchange="getMont()" required disabled>
                            <option value="" selected="true" disabled="disabled">Linha</option>
                            @foreach ($linhas as $linha)
                                <option value="{{ $linha->id }}">{{ $linha->name }}</option>
                            @endforeach
                        </select>

                        <select name="mont" id="mont" onChange="getVeiculo()" required disabled>
                            <option value="" selected="true" disabled="disabled">Montadora</option>
                        </select>
    
                        <select name="veic" id="veic" disabled>
                            <option value="" selected="true" disabled="disabled">Veículo</option>
                        </select>
                        
                        <button type="submit" class="btnPesquisar">Pesquisar</button>
                    </div>
                </form>
            </div>
        </section>
        <hr>
        <section class="resultItens"><div class="container"></div></section>

    </div>
    
    <footer>
        <div class="container">
            <div>Efrari Cabos Flexíveis | © 2020 | Todos os direitos reservados</div>
            <div>by carvalhoms</div>
        </div>
    </footer>

    <div id="overlay" class="overlay"></div>
    
    <script src="{{ url(mix('js/catalog/main.js')) }}"></script>
</body>
</html>