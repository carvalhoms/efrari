@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Cadastrar Montadora')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Editar Linha </h1></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edição </h3>
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

            <form method="post" action="{{ route('linhas.update', $linha) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="name"> Nome da Montadora </label>
                        <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $linha->name }}" required
                            onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Alterar </button>
                    <a href=" {{ route('linhas.index') }}" class="btn btn-danger"> Cancelar </a>
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