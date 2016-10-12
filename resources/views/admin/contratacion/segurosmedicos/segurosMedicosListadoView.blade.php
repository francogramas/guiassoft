@extends('layouts.dashboardAdmin')
@section('page_heading','Listado de seguros médicos')
@section('section')
	<table class="table table-striped">
		<thead>
			<tr>
				<td>Tipo</td>
				<td>Código</td>
				<td>Nit</td>
				<td>Razón social</td>
				<td>Departamento</td>
				<td>Ciudad</td>
				<td>Dirección</td>
				<td>Teléfono</td>			
				<td></td>	
			</tr>
		</thead>
		<tbody>
		@foreach ($segurosmedicos as $seguromedico)				
			<tr>
				<td>{{ $seguromedico->tipo }}</td>
				<td>{{ $seguromedico->codigo }}</td>
				<td>{{ $seguromedico->nit }}</td>
				<td>{{ $seguromedico->razonsocial }}</td>
				<td>{{ $seguromedico->departamento }}</td>
				<td>{{ $seguromedico->ciudad }}</td>
				<td>{{ $seguromedico->direccion }}</td>
				<td>{{ $seguromedico->telefono }}</td>
				<td> <a href="{{ route('segurosmedicos.edit',$seguromedico->id) }}">Editar</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop