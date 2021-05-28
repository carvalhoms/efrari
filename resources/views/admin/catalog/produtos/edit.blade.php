@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Cadastrar Montadora')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Edição Produto </h1></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Editando Iten - {{ $produto->codigo }} </h3>
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-produto-tab" data-toggle="pill" href="#custom-content-below-produto" role="tab" aria-controls="custom-content-below-produto" aria-selected="true">Dados Produto</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-aplicacao-tab" data-toggle="pill" href="#custom-content-below-aplicacao" role="tab" aria-controls="custom-content-below-aplicacao" aria-selected="false">Aplicações</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-referencias-tab" data-toggle="pill" href="#custom-content-below-referencias" role="tab" aria-controls="custom-content-below-referencias" aria-selected="false">Referências</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-imagem-tab" data-toggle="pill" href="#custom-content-below-imagem" role="tab" aria-controls="custom-content-below-imagem" aria-selected="false">Imagem</a>
            </li>
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade show active" id="custom-content-below-produto" role="tabpanel" aria-labelledby="custom-content-below-produto-tab">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('produtos.update', $produto) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="codigo"> Código Produto </label>
                                <input type="text" name="codigo" value="{{ $produto->codigo }}" class="form-control" placeholder="Nome" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="comp"> Comprimento (mm) </label>
                                <input type="text" name="comp" value="{{ $produto->comp }}" class="form-control" placeholder="Nome" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="descricao"> Descrição </label>
                                    <select name="descricao" id="descricao" class="form-control">
                                        @foreach ($descricoes as $descricao)
                                            <option value="{{ $descricao->id }}" {{ $descricao->name === $produto->descricao->name ? 'selected' : '' }}> {{ $descricao->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> Cadastrar </button>
                        <a href="{{ route('produtos.index') }}" class="btn btn-danger"> Cancelar </a>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="custom-content-below-aplicacao" role="tabpanel" aria-labelledby="custom-content-below-aplicacao-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-start; border-bottom:none">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-aplicacao"> Incluir Aplicação </button>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th>Linha</th>
                            <th>Montadora</th>
                            <th>Aplicação</th>
                            <th style="width: 50px">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($aplicacoes as $aplicacao)                            
                                <tr>
                                <td>{{ $aplicacao->montadora->linha->name }}</td>
                                <td>{{ $aplicacao->montadora->name }}</td>
                                <td>{{ $aplicacao->aplic }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('aplicacao.destroy', ['aplicacao' => $aplicacao->id]) }}" method="POST" name="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return conf()" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="modal-aplicacao">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Cadastrar nova Aplicação</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ route('aplicacao.create', $produto) }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="produto" value="{{ $produto->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="aplic"> Aplicação </label>
                                            <input type="text" name="aplic" class="form-control" placeholder="Aplicação" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="montadora"> Montadora </label>
                                                <select name="montadora_id" id="montadora_id" class="form-control">
                                                    @foreach ($montadoras as $montadora)
                                                        <option value="{{ $montadora->id }}">{{ $montadora->name . " - (" . $montadora->linha['name'] . ")" }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="custom-content-below-referencias" role="tabpanel" aria-labelledby="custom-content-below-referencias-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-start; border-bottom:none">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-referencias"> Incluir Referência </button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th>Referencia</th>
                            <th>Marca</th>
                            <th style="width: 50px">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($referencias as $referencia)
                                <tr>
                                <td>{{ $referencia->ref }}</td>
                                <td>{{ $referencia->marca }}</td>
                                <td>
                                    <div class="btn-group">                    
                                        <form action="{{ route('referencia.destroy', ['referencia' => $referencia->id]) }}" method="POST" name="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return conf()" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="modal-referencias">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Cadastrar nova Referência</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ route('referencia.create') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="produto" value="{{ $produto->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="ref"> Referência </label>
                                            <input type="text" name="ref" class="form-control" placeholder="Referencia" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="marca"> Marca </label>
                                            <input type="text" name="marca" class="form-control" placeholder="Marca">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="custom-content-below-imagem" role="tabpanel" aria-labelledby="custom-content-below-imagem-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-start; border-bottom:none">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-imagem"> Carregar Imagem </button>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="imgProductAdm">
                            <img src="{{ asset('storage/produtosImg/'. ($produto->img === null ? 'semImg.jpeg' : $produto->img)) }}" alt="Produto sem Foto">
                        </div>
                    </div>

                    <div class="modal fade" id="modal-imagem">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('produto.uploadImg') }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="idProduto" value="{{ $produto->id }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Upload Imagem</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" name="uploadImg">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ url(mix('css/admin/main.css')) }}">
@stop

@section('js')
    <script>
        $(function () {
            $("#example1").DataTable();

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        });
    </script>
@stop