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

            <form method="post" action="{{ route('blog.update', $blog) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body card-body-blog">
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contato"> Imagem Post </label>
                                    <img src="{{ asset('storage/imagensBlog/'. ($blog->img === null ? 'semImg.jpeg' : $blog->img)) }}" alt="Post sem Foto">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-imagem"> Carregar Imagem </button>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="contato"> Anexo Post </label>
                                    <img src="{{ asset('storage/arquivosBlog/'. ($blog->file === null ? 'semArq.jpeg' : 'blogArq.jpeg')) }}" alt="Post sem Anexo">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-file"> Carregar Arquivo </button>
                                </div>
                            </div>
                            <br><hr>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="empresa"> Título do Post </label>
                            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="contato"> Subtitulo do Post </label>
                            <input type="text" name="subTitle" value="{{ $blog->subTitle }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="uf"> Texto do Post </label>
                            <textarea name="text" class="form-control" required>{{ $blog->text }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Salvar </button>
                    <a href=" {{ route('blog.index') }}" class="btn btn-danger"> Cancelar </a>
                </div>
            </form>

            <div class="modal fade" id="modal-imagem">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('blog.uploadImg') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="idPost" value="{{ $blog->id }}">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Upload Imagem</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="uploadImg" required>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-file">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('blog.uploadFile') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="idPost" value="{{ $blog->id }}">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Upload Arquivo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="uploadFile" required>
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