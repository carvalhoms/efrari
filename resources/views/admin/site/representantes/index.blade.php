@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Inicio')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Representantes </h1></div>
    <div><a href=" {{ route('representantes.create') }}" class="btn btn-sm btn-primary"> Cadastrar Novo </a></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)
    
<div class="card">
  <div class="card-header">
      <h3 class="card-title">Representantes Cadastradas</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Representante</th>
        <th>Contato</th>
        <th>Fone</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>UF</th>
        <th class="reduzColTitle">Ações</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($repres as $repre)
          <tr>
            <td>{{ $repre->empresa }}</td>
            <td>{{ $repre->contato }}</td>
            <td>{{ $repre->fone1 }}</td>
            <td>{{ $repre->email }}</td>
            <td>{{ $repre->cidade }}</td>
            <td>{{ $repre->uf }}</td>
            <td class="reduzCol">
              <div class="btn-group">
                <form action="{{ route('representantes.edit', ['representante' => $repre->id]) }}">
                  <button type="submit" class="btn btn-xs btn-primary"> Editar </button>
                </form>

                <form action="{{ route('representantes.destroy', ['representante' => $repre->id]) }}" method="POST" name="delete">
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
