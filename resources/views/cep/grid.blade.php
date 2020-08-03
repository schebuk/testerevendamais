@extends('layout.app')
@section('title', 'Teste Revendamais')
@include('layout.messages')
 
@section('content')
<h1>Listagem de Cep</h1>
<hr>
<div class="container">
      <form method="get" action="{{ route('cep.create')}}" style="display: inline" >
            @csrf
            <input type="hidden" name="_method" value="create" >
            <input type="text" name="cep" value="">
            <button class="btn btn-info btn-sm">pesquisar CEP</button>
        </form>
    <table class="table table-bordered table-striped table-sm">
        <thead>
      <tr>
          <th>cep</th>
          <th>logradouro</th>
          <th>Sobrenome</th>
          <th>cidade</th>
          <th>uf</th>
          <th>
          </th>
      </tr>
        </thead>
        <tbody>
      @forelse($cep as $cep)
      <tr>
          <td>{{ $cep->cep }}</td>
          <td>{{ $cep->logradouro }}</td>
          <td>{{ $cep->bairro }}</td>
          <td>{{ $cep->cidade }}</td>
          <td>{{ $cep->uf }}</td>
   
          <td>
        <a href="{{ route('cep.edit', $cep->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="{{ route('cep.destroy', $cep->id) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
            @csrf
            <input type="hidden" name="_method" value="delete" >
            <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
          </td>
      </tr>
      @empty
      <tr>
          <td colspan="6">Nenhum registro encontrado para listar</td>
      </tr>
      @endforelse
        </tbody>
    </table>
</div>
@endsection