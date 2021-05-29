@extends ('adminlte::page')

@section('title', 'Painel Sparekits - Usuários')

@section('content_header')
    <h1>Cadastro de Usuário</h1>
@stop

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Novo Usuário</h3>
        </div>
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            <div class="card-body">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Nome usuário</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email usuário</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>

    </div>
@stop
