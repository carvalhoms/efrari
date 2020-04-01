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
        <h3 class="card-title"> Edição </h3>
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
                                <input type="text" name="codigo" value="{{ $produto->codigo }}" class="form-control" placeholder="Nome" required 
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="comp"> Comprimento (mm) </label>
                                <input type="text" name="comp" value="{{ $produto->comp }}" class="form-control" placeholder="Nome" required
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
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
                        <a href=" {{ route('produtos.create') }}" class="btn btn-sm btn-primary"> Incluir Aplicação </a>
                      </div>
                    <div class="card-body p-0">
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th>Aplicação</th>
                            <th style="width: 50px">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                            <td>CORSA PICK-UP 1.4 MPFI - TODOS - ANO: 97... 00</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('produtos.edit', ['produto' => $produto->id]) }}">
                                      <button type="submit" class="btn btn-xs btn-primary"> Editar </button>
                                    </form>
                    
                                    <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="POST" name="delete">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" onclick="return conf()" class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:flex-end; border-bottom:none">
                        <a href=" {{ route('produtos.create') }}" class="btn btn-sm btn-primary"> Incluir Referência </a>
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
                            <tr>
                            <td>9239834545</td>
                            <td>Fania</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('produtos.edit', ['produto' => $produto->id]) }}">
                                      <button type="submit" class="btn btn-xs btn-primary"> Editar </button>
                                    </form>
                    
                                    <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="POST" name="delete">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" onclick="return conf()" class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
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