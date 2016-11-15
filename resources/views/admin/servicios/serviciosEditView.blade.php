@extends('layouts.dashboardAdmin')
@section('page_heading','Datos de la empresa')
@section('section')
{!! Form::model($servicios, ['route' => ['servicios.update',$servicios->id],'method'=>'PUT']) !!}
{{ csrf_field() }}

	<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Servicio</label>
			{!! Form::text('nombre',$servicios{'nombre'},['id'=>'nombre','required'=>'required','class'=>'form-control']) !!}		
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="ambit">Tipo de usuario</label>
			{!! Form::text('ambitoprocedimiento_id',$servicios{'ambitoprocedimiento_id'},['id'=>'ambitoprocedimiento_id','required'=>'required','class'=>'form-control']) !!}		
		</div>
	</div>
	<div class="col-sm3">
		<button type="submit" class="btn btn-primary" > Actualizar </button>		
	</div>
</div>

{!! Form::close() !!}
@stop