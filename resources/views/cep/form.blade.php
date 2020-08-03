@extends('layout.app')
@section('title', 'Registro')
 
@section('content')
<h1>Registro</h1>
<hr>
@include('layout.messages')
<div class="container">
 
    {!! Form::model($cep, ['method' => 'put', 'route' => ['cep.update', $cep->id ], 'class' => 'form-horizontal']) !!}
 
  
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">

      <div class="form-row form-group">
 
          {!! Form::label('cep', 'CEP', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-10">
 
        {!! Form::text('cep', null, ['class' => 'form-control', 'placeholder'=>'Preencha o CEP'], ['readonly']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('logradouro', 'Logradouro', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('logradouro', null, ['class' => 'form-control', 'placeholder'=>'Preencha o Logradouro']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('bairro', 'Bairro', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('bairro', null, ['class' => 'form-control', 'placeholder'=>'Preencha o Bairro']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('cidade', 'Cidade', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-8">
 
        {!! Form::text('cidade', null, ['class' => 'form-control', 'placeholder'=>'Preencha a cidade']) !!}
 
          </div>
 
      </div>
      <div class="form-row form-group">
 
          {!! Form::label('uf', 'UF', ['class' => 'col-form-label col-sm-2 text-right']) !!}
 
          <div class="col-sm-4">
 
        {!! Form::text('uf', null, ['class' => 'form-control', 'placeholder'=>'Preencha o UF']) !!}
 
          </div>
 
      </div>
        </div>
        <div class="card-footer">
      {!! Form::button('cancelar', ['class'=>'btn btn-danger btn-sm', 'onclick' =>'windo:history.go(-1);']); !!}
      {!! Form::submit(  isset($cep) ? 'atualizar' : 'criar', ['class'=>'btn btn-success btn-sm']) !!}
 
        </div>
    </div>
 
    {!! Form::close() !!}
 
</div>
@endsection