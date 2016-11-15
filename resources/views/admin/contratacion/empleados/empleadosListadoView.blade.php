@extends('layouts.dashboardAdmin')
@section('page_heading','Administrar empleados')
@section('section')

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
				{!! Form::text('buscar_id',null,['id'=>'buscar_id','class'=>'form-control','placeholder'=>'Buscar...']) !!}
				{!! Form::hidden('empleado_id',0,['id'=>'empleado_id']) !!}
		</div>
	</div>
	<div class="col-sm-2">
		<button type="submit" class="btn btn-primary" >Buscar</button>		
	</div>
</div>


<table  class="table table-striped" style="font-size: 10pt;">
	<thead>
		<tr>
			<td>T. Documento</td>
			<td>Documento</td>
			<td>Nombres</td>
			<td>F. Nacimiento</td>
			<td>Teléfono</td>
			<td>Correo</td>
			<td>Ciudad</td>
			<td>Dirección</td>
			<td>Estado</td>
			<td>Rol</td>
			<td></td>

		</tr>
	</thead>
	<tbody>
	@foreach ($empleados as $empleado)
		<tr>
			<td>{!! $empleado->tipocod !!}</td>
			<td>{!! $empleado->documento !!}</td>
			<td>{!! $empleado->nombre.' '.$empleado->apellido1.' '.$empleado->apellido2 !!}</td>
			<td>{!! $empleado->nacimiento !!}</td>
			<td>{!! $empleado->telefono !!}</td>
			<td>{!! $empleado->correo !!}</td>
			<td>{!! $empleado->ciudad !!}</td>
			<td>{!! $empleado->direccion !!}</td>
			<td>{!! $empleado->estadoEmp !!}</td>
			<td>{!! $empleado->role !!}</td>
			<td><a href="{{ route('empleados.edit',$empleado->id) }}">Editar</a></td>
		</tr>
	@endforeach
	</tbody>
</table>


@stop()