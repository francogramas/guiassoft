<style type="text/css" media="screen">
	.tablaLista>tbody>tr>td{
		margin-left: 10px;
		padding-left: 10px;
	}
</style>
<table class="tablaLista">
	<tbody>
		@foreach ($cita as $citai)
			<tr>
				<td style="width: 200px;"> 
					{{ $citai->nombre1." ".$citai->nombre2." ".$citai->apellido1." ".$citai->apellido2 }} 
				</td>
				<td>  getAge({{ $citai->nacimiento }}); </td>
				<td>
					{{ $citai->estado }}
				</td>
				<td>
					{{ $citai->razonsocial }}
				</td>
				<td>
					{{ $citai->contrato }}
				</td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
</table>