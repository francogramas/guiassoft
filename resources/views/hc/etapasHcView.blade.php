@extends('layouts.dashboardAdmin')
@section('page_heading','Administración de etapas de historias clínicas')
@section('section')

{{ csrf_field() }}
<div class="row">
	<label for=""></label>
	<input type="text" class="form-control" id="txtEtapa">
	<button type="button">Agregar</button>
</div>
<div>
	<table class="table">
		<thead>
			<tr>
				<td><b>Etapa</b></td>
				<td><b></b></td>
			</tr>
		</thead>
		<tbody>
		@foreach ($etapa as $etapai)
			<tr>
				<td>{{ $etapai->nombre }}</td>
				<td></td>
			</tr>
		@endforeach			
		</tbody>
	</table>
</div>
@stop