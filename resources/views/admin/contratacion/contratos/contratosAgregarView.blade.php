@extends('layouts.dashboardAdmin')
@section('page_heading','Agregar contratos')
@section('section')
{!! Form::open(['route' => 'contratos.store','method'=>'POST']) !!}
{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="numero">Número</label>
				{!! Form::text('numero',null,['id'=>'numero','required'=>'required','class'=>'form-control','placeholder'=>'Número de contrato']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="seguromedico_id">Seguro médico</label>
				{!! Form::select('seguromedico_id', $seguromedico,'', ['id' => 'seguromedico_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre">Nombre del contrato</label>
			{!! Form::text('nombre',null,['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Nombre del contrato']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="plan">Plan del contrato</label>
			{!! Form::text('plan',null,['id'=>'plan','required'=>'redquires','class'=>'form-control','placeholder'=>'Nombre del Plan']) !!}			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="inicio">Fecha de incio</label>
			{!! Form::date('inicio',null,['id'=>'inicio','required'=>'required','class'=>'form-control','placeholder'=>'Fecha de inicio']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="final">Fecha de finalización</label>
			{!! Form::date('final',null,['id'=>'final','required'=>'required','class'=>'form-control','placeholder'=>'Fecha de finalización']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipocontrato">Tipo de contrato</label>
			{!! Form::select('tipocontrato_id', $tipocontrato,'', ['id' => 'tipocontrato_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estadocontrato">Estado</label>
			{!! Form::select('estadocontrato_id', $estadocontrato,'', ['id' => 'estadocontrato_id','class'=>'form-control']) !!}			

		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="monto">Monto</label>
			{!! Form::number('monto',null,['id'=>'monto','required'=>'redquires','class'=>'form-control','placeholder'=>'Monto contrato']) !!}						
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
			<br> <button type="submit" class="btn btn-primary" > Agregar  </button>	

		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop