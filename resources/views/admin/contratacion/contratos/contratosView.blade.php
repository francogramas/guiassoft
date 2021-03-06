@extends('layouts.dashboardAdmin')
@section('page_heading','Agregar contratos')
@section('section')
{!! Form::model($contratos, ['route' => ['contratos.update',$contratos->id],'method'=>'PUT']) !!}

{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="numero">Número</label>
				{!! Form::text('numero',$contratos{'numero'},['id'=>'numero','required'=>'required','class'=>'form-control','placeholder'=>'Número de contrato']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="seguromedico_id">Seguro médico</label>
				{!! Form::select('seguromedico_id', $seguromedico,$contratos{'seguromedico_id'}, ['id' => 'seguromedico_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre">Nombre del contrato</label>
			{!! Form::text('nombre',$contratos{'nombre'},['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Nombre del contrato']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="plan">Plan del contrato</label>
			{!! Form::text('plan',$contratos{'plan'},['id'=>'plan','required'=>'redquires','class'=>'form-control','placeholder'=>'Nombre del Plan']) !!}			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="inicio">Fecha de incio</label>
			{!! Form::date('inicio',$contratos{'inicio'},['id'=>'inicio','required'=>'required','class'=>'form-control','placeholder'=>'Fecha de inicio']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="final">Fecha de finalización</label>
			{!! Form::date('final',$contratos{'final'},['id'=>'final','required'=>'required','class'=>'form-control','placeholder'=>'Fecha de finalización']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipocontrato">Tipo de contrato</label>
			{!! Form::select('tipocontrato_id', $tipocontrato, $contratos{'tipocontrato_id'}, ['id'=>'tipocontrato_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estadocontrato">Estado</label>
			{!! Form::select('estadocontrato_id', $estadocontrato, $contratos{'estadocontrato_id'}, ['id'=>'estadocontrato_id','class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="monto">Monto</label>
			{!! Form::number('monto',$contratos{'monto'},['id'=>'monto','required'=>'redquires','class'=>'form-control','placeholder'=>'Monto contrato']) !!}						
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
			<br> <button type="submit" class="btn btn-primary" > Actualizar  </button>	

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