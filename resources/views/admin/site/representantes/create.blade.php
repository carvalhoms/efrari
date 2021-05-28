@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Cadastrar Montadora')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Cadastrar novo Representante </h1></div>
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

            <form method="post" action="{{ route('representantes.store') }}">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="empresa"> Nome Representação </label>
                            <input type="text" name="empresa" class="form-control" placeholder="Empresa" required
                            onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="contato"> Contato </label>
                            <input type="text" name="contato" class="form-control" placeholder="Nome" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="uf"> UF </label>
                            <input type="text" name="uf" class="form-control" placeholder="UF" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="cidade"> Cidade </label>
                            <input type="text" name="cidade" class="form-control" placeholder="Cidade" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="fone1"> Telefone 1 </label>
                            <input type="text" name="fone1" class="form-control" placeholder="(11) 99999-9999" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="fone2"> Telefone 2 </label>
                            <input type="text" name="fone2" class="form-control" placeholder="(11) 99999-9999">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="fone3"> Telefone 3 </label>
                            <input type="text" name="fone3" class="form-control" placeholder="(11) 99999-9999">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="fone4"> Telefone 4 </label>
                            <input type="text" name="fone4" class="form-control" placeholder="(11) 99999-9999">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="email"> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Cadastrar </button>
                    <a href=" {{ route('representantes.index') }}" class="btn btn-danger"> Cancelar </a>
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