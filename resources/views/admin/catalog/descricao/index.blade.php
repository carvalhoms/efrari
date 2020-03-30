@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Inicio')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Descrições de Produtos </h1></div>
    <div><a href=" {{ route('descricao.create') }}" class="btn btn-sm btn-primary"> Cadastrar Nova </a></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)
    
<div class="card">
  <div class="card-header">
      <h3 class="card-title">Descrições Cadastradas</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Descrições</th>
        <th class="reduzColTitle">Ações</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($descricoes as $descricao)
          <tr>
            <td>{{ $descricao->id }}</td>
            <td>{{ $descricao->name }}</td>
            <td class="reduzCol">
              <div class="btn-group">
                <form action="{{ route('descricao.edit', ['descricao' => $descricao->id]) }}">
                  <button type="submit" class="btn btn-xs btn-primary"> Editar </button>
                </form>

                <form action="{{ route('descricao.destroy', ['descricao' => $descricao->id]) }}" method="POST" name="delete">
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

        function conf(){ 
          return confirm('Tem certeza que quer deletar? Isso não poderá ser desfeito!');
        }
    </script>
@stop
