@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Cadastrar Montadora')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Cadastrar novo Produto </h1></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)



<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Cadastro </h3>
    </div>

    <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('produtos.store') }}">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="codigo"> Código Produto </label>
                                <input type="text" name="codigo" class="form-control" placeholder="Codigo do Produto" required
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="comp"> Comprimento (mm) </label>
                                <input type="text" name="comp" class="form-control" placeholder="Comprimento"
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="descricao"> Assossie a uma Descrição </label>
                                    <select name="descricao" id="descricao" class="form-control">
                                        <option selected disabled>Selecione uma Descrição</option>
    
                                        @foreach ($descricoes as $descricao)
                                            <option value="{{ $descricao->id }}"> {{ $descricao->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="linha"> Assossie a uma Linha </label>
                                    <select name="linha" id="linha" class="form-control">
                                        <option selected disabled>Selecione uma Linha</option>
    
                                        @foreach ($linhas as $linha)
                                            <option value="{{ $linha->id }}"> {{ $linha->name }} </option>
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