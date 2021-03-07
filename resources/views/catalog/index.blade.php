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
                        <input type="text" name="code" id="codEfrari" placeholder="Pesquisa por Código EFRARI, Número Original ou Referência" required>
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

    <div id="modalProductView">
        <div id="modalBody">
            <div class="content">
                <div class="img">
                    <img src="{{ asset('storage/produtosImg/a0f63fbdc295f789e8fa0673ce8313ddd4b43528.jpeg') }}">
                </div>
                <div class="header">
                    <svg version="1.1" class="closeBtn" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2 2" style="enable-background:new 0 0 2 2;" xml:space="preserve">
                        <g><path d="M1.98,1.98L1.98,1.98c-0.03,0.03-0.08,0.03-0.11,0L0.02,0.13c-0.03-0.03-0.03-0.08,0-0.11l0,0c0.03-0.03,0.08-0.03,0.11,0l1.84,1.84C2.01,1.9,2.01,1.95,1.98,1.98z"/></g>
                        <g><path d="M0.02,1.98L0.02,1.98c-0.03-0.03-0.03-0.08,0-0.11l1.84-1.84c0.03-0.03,0.08-0.03,0.11,0l0,0c0.03,0.03,0.03,0.08,0,0.11L0.13,1.98C0.1,2.01,0.05,2.01,0.02,1.98z"/></g>
                    </svg>
                </div>
                <div class="cod">
                    <p class="legenda">Código Efrari:</p>
                    <p class="codigo">EF9654</p>
                </div>
                <div class="desc">
                    <p class="legenda">Descrição Produto:</p>
                    <p class="descricao">Cabo do Freio de Mão</p>
                </div>
                <div class="med">
                    <p class="legenda">Medidas:</p>
                    <p class="medidas">1.200mm / 1.400mm</p>
                </div>
                <div class="ref">
                    <p class="legenda">Referências:</p>
                    <div class="refs">
                        <table class="table">
                            <tr>
                                <th>Marca</th>
                                <th>Referência</th>
                            </tr>
                            <tr>
                                <td>Número Original</td>
                                <td>845234588</td>
                            </tr>

                            <tr>
                                <td>Fania</td>
                                <td>845234588</td>
                            </tr>
                            <tr>
                                <td>Cabovel</td>
                                <td>845234588</td>
                            </tr>
                            <tr>
                                <td>IKS</td>
                                <td>845234588</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="aplic">
                <div class="aplics">
                    <p class="legenda">Aplicações:</p>
                    <table class="table">
                        <tr>
                            <th>Linha</th>
                            <th>Montadora</th>
                            <th>Aplicação</th>
                        </tr>
                        <tr>
                            <td>Leve</td>
                            <td>General Motors</td>
                            <td>Corsa 1.8 MPFI 4p 2008/2020</td>
                        </tr>
                        <tr>
                            <td>Leve</td>
                            <td>General Motors</td>
                            <td>Corsa 1.8 MPFI 4p 2008/2020</td>
                        </tr>
                        <tr>
                            <td>Leve</td>
                            <td>General Motors</td>
                            <td>Corsa 1.8 MPFI 4p 2008/2020</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    
    <script src="{{ url(mix('js/site/main.js')) }}"></script>
</body>
</html>