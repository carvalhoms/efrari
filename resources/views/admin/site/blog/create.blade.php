@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Cadastrar Montadora')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Cadastrar novo Post </h1></div>
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

            <form method="post" action="{{ route('blog.store') }}">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="empresa"> Título do Post </label>
                            <input type="text" name="title" class="form-control" required
                            onfocus="this.selectionStart = this.selectionEnd = this.value.length;" autofocus="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="contato"> Subtitulo do Post </label>
                            <input type="text" name="subTitle" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="uf"> Texto do Post </label>
                            <textarea name="text" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Cadastrar </button>
                    <a href=" {{ route('blog.index') }}" class="btn btn-danger"> Cancelar </a>
                </div>
            </form>
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