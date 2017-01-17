<table class="table">
	<thead>
		<tr>
			<td><b>Etapa</b></td>
			<td><b></b></td>
		</tr>
	</thead>
	<tbody>
	@foreach ($etapashc as $etapashci)
		<tr>
			<td>{{ $etapashci->nombre }}</td>
			<td>
				<a href="#" id="borrarEtapa" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
				<a href="#" id="editarEtapa" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>