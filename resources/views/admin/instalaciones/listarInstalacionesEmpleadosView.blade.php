<script>
	$(".borrarInstalacionEmpleados").click(function(event) {
      var instalacionEmpleadoId = $('input[type=hidden]', $(this).closest("tr")).val();
      var token=$("input[name=_token]").val();

      $.ajax({
          url: '/instalacionempleadoborrar/'+instalacionEmpleadoId,
          headers:{'X-CSRF-TOKEN':token},      
          type: 'POST',
          dataType: 'json',
      });

      var instalacionId = $("#instalacionId").val();
      $.get("/listarinstalacionesempleado/"+instalacionId+"", function(response,state){
          $("#divlistarAsignaciones").empty().html(response);        
      });
  });
</script>
<table class="table table-striped" style="font-size: 0.87em;">
	<thead>
		<tr>
			<td>Día</td>
			<td>Empleado</td>
			<td>Hora Inicial</td>
			<td>Hora Final</td>
			<td>Intérvalo</td>
			<td>Cupo</td>
			<td></td>			
		</tr>
	</thead>
	<tbody>
	@foreach ($instalacion_empleado as $instalacionEmpleadoi)
		<tr>
			<td>
				{!! $instalacionEmpleadoi->dia !!}
			</td>
			<td>
				<input type="hidden" value={!! $instalacionEmpleadoi->id !!}>
				{!! $instalacionEmpleadoi->nombre." ".$instalacionEmpleadoi->apellido1." ".$instalacionEmpleadoi->apellido2 !!}</td>
			<td>{!! $instalacionEmpleadoi->horai!!}</td>
			<td>{!! $instalacionEmpleadoi->horaf!!}</td>
			<td>{!! $instalacionEmpleadoi->intervalo!!}</td>
			<td>{!! $instalacionEmpleadoi->cupo!!}</td>
			<td><a href="#" class="btn btn-danger btn-xs borrarInstalacionEmpleados" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>				
			</td>
		</tr>
	@endforeach		
	</tbody>
</table>