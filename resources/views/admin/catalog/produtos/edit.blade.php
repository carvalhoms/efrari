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

                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="name"> Código Produto </label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" required
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="name"> Comprimento (mm) </label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" required
                                onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="name"> Descrição </label>
                                    <select name="montadora" id="montadora" class="form-control">

                                        <option value=""> Option 001 </option>
                                        <option value=""> Option 002 </option>
                                        <option value=""> Option 003 </option>
                                        <option value=""> Option 004 </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="name"> Linha </label>
                                    <select name="montadora" id="montadora" class="form-control">

                                        <option value=""> Option 001 </option>
                                        <option value=""> Option 002 </option>
                                        <option value=""> Option 003 </option>
                                        <option value=""> Option 004 </option>
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
                Aplicações
            </div>

            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                Referências
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