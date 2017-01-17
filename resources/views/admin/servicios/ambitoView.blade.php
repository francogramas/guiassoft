<table class="table table-striped">
	<tbody>
	@foreach ($ambitoprocedimiento as $ambito)
		<tr>
			<td>
			 <a href="{{ route('servicios.show',$ambito->id) }}">{{ $ambito->descripcion }}</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>