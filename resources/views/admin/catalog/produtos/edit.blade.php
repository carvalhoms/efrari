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
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Dados Produto</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Aplicações</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Referências</a>
            </li>
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
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
                        
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="linha"> Linha </label>
                                    <select name="linha" id="linha" class="form-control">
                                        @foreach ($linhas as $linha)
                                            <option value="{{ $linha->id }}" {{ $linha->name === $produto->linha->name ? 'selected' : '' }}> {{ $linha->name }} </option>
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

            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-end; border-bottom:none">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-aplicacao"> Incluir Aplicação </button>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th>Montadora</th>
                            <th>Aplicação</th>
                            <th style="width: 50px">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($aplicacoes as $aplicacao)                            
                                <tr>
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
                                                        <option value="{{ $montadora->id }}">{{ $montadora->name }}</option>
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

            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-end; border-bottom:none">
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
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/main.css">
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