@extends('layouts.dashboardAdmin')
@section('page_heading','Administración de instalaciones')
@section('section')

{!! Form::open(['method'=>'POST']) !!}
{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<h4>Agregar instalaciones</h4>
			<label for="inst_servicio">Servicio que se presta</label>
			{!! Form::select('inst_servicio', $inst_servicio,null, ['id' => 'inst_servicio','class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="inst_tipo">Tipo de instalación</label>
			{!! Form::select('inst_tipo', ['0'=>'Seleccione el tipo de instalacion'],null, ['id' => 'inst_tipo','class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="instNombre">Nombre de la instalación</label>			
			<input type="text" name="instNombre" id="instNombre" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="instCupo">Cupo de la instalación</label>		
			<ul class="list-inline">
			 	<li>
					<input type="number" min="1" max="100" interval="1" name="instCupo" id="instCupo" class="form-control"  required="required" value="1">	
			  	</li>
			  	<li>
					<button type="button" id="guardarInstalacion" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar instalacion"><i class="fa fa-plus"></i></button> 	
			  	</li>
			</ul>	

		</div>
		<div class="form-group">
		</div>
	</div>
	<div class="col-sm-3 form-group">
		<h4>Asignar instalaciones</h4>
		<div id="divlistarInstalaciones"></div>
	</div>
	<div class="col-sm-6 form-group">
		<h4>Administrar instalaciones</h4>
		<div id="divlistarAsignaciones"></div>
	</div>
</div>
{!! Form::close() !!}
@stop