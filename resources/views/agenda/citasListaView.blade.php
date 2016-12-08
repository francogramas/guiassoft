<h4>Historial de citas</h4>
<table class="table table-striped" style="font-size: 10pt;">
	<thead>
		<tr>
			<td>Fecha</td>
			<td>Especialidad</td>
		</tr>
	</thead>
	<tbody>
	@foreach ($citas as $cita)
		<tr>
			<td>{{ $cita->fecha }}</td>
			<td>{{ $cita->Especialidad }}</td>
		</tr>
	@endforeach		
	</tbody>
</table>