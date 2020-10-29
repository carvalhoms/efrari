@extends ('adminlte::page')

@section ('title', 'Painel Efrari - Inicio')

@section ('content_header')
    <div class="pageControls">
        <div><h1 class="teste"> Newsletter </h1></div>
    </div>
@stop

@section ('content')

@section('plugins.Datatables', true)
    
<div class="card">
  <div class="card-header">
      <h3 class="card-title">Emails Cadastrados Newsletter</h3>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Email</th>
        <th>Data de Cadastro</th>
        <th class="reduzColTitle">Ações</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($emails as $email)
          <tr>
            <td>{{ $email->email }}</td>
            <td>{{ $email->created_at->format('d/m/Y') }}</td>
            <td class="reduzCol">
              <div class="btn-group">
                <form action="{{ route('newsletter.destroy', ['newsletter' => $email->id]) }}" method="POST" name="destroy">
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

        function conf(){ 
          return confirm('Tem certeza que quer deletar? Isso não poderá ser desfeito!');
        }
    </script>
@stop
