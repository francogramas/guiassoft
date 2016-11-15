@extends('layouts.dashboardAdmin')
@section('page_heading','Administración de servicios')
@section('section')

{!! Form::open(['route' => 'servicios.store','method'=>'POST']) !!}
{{ csrf_field() }}

<div class="row">
	<div class="col-sm-2">
		<h4>Ámbito: </h4> 
		<h5><label id='lblAmbito'></label></h5>
		{!! Form::hidden('ambitoprocedimiento_id',null,['id'=>'ambitoprocedimiento_id']) !!}				 

		<table class="table table-striped">
			<tbody>
			@foreach ($ambitoprocedimiento as $ambito)
				<tr>
					<td>
						{!! Form::hidden('ambitoprocedimiento_id'.$ambito->id,$ambito->id,['id'=>'ambitoprocedimiento_id'.$ambito->id]) !!}				 
					 	<a href="#" class="listarServicios">{{ $ambito->descripcion }}</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-sm-3 form-inline">
		<h4>Servicio:</h4>
	    <h5><label id='lblServicio'></label></h5>
			{!! Form::text('servicioNombre',null,['id'=>'servicioNombre','class'=>'form-control','placeholder'=>'Nuevo...']) !!}
			<a href="#" id="agregarServicio" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar servicio"><i class="fa fa-plus"></i></a>
			{!! Form::hidden('servicio_id',null,['id'=>'servicio_id']) !!}				 
			<div id="divlistarservicios"></div>
	</div>
	<div class="col-sm-3 form-inline">
		<h4>Especialidad:</h4>
	    <h5><label id='lblEspecialidad'></label></h5>		
			{!! Form::text('especilidadNombre',null,['id'=>'especilidadNombre','class'=>'form-control','placeholder'=>'Nuevo...']) !!}
			{!! Form::hidden('especialidad_id',null,['id'=>'especialidad_id']) !!}				 			
			<a href="#" id="agregarEspecialidad" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar especialidad"><i class="fa fa-plus"></i></a>
			<div id="divlistarespecialidad"></div>
	</div>
	<div class="col-sm-4 form-inline">
		<h4>Cups</h4>
	    <h5><label id='lblCups'></label></h5>				
		{!! Form::text('cupsespecialidadnombre',null,['id'=>'cupsespecialidadnombre','class'=>'form-control','placeholder'=>'Nuevo...']) !!}
			{!! Form::hidden('cupsespecialidad_id',null,['id'=>'cupsespecialidad_id']) !!}				 					
			{!! Form::hidden('cupscodigo',null,['id'=>'cupscodigo']) !!}				 					
		<a href="#" id="agregarCupsespecialidad" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar cups"><i class="fa fa-plus"></i></a>
		<div id="divlistarcupsespecialidad"></div>
	</div>
</div>

{!! Form::close() !!}
@stop