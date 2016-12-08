<script>
	$('.asignarespecialidadEmpleados').click(function(event) {   
    var empleadoId = $('input[type=hidden]', $(this).closest("tr")).val();
    var especialidadId = $ ("#especialidad_id").val();
    var token=$("input[name=_token]").val();
    
    var route='/especialidadEmpleadosCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {empleados_id: empleadoId, especialidad_id: especialidadId},
      success:function(data){
        if (data.success='true'){
            console.log('Hecho')
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
    
    $.ajax({
        url: '/listarempleadosEspecialidad/'+especialidadId,
        type: 'GET',
        success:function(data){
          $("#divEspecialidadEmpleados").empty().html(data);
        },
        error:function(data){
          console.log('Error');
        }
    });

  });
</script>
<table class="table table-striped">
	<tbody>
	@foreach ($empleados as $empleado)
		<tr>
			<td>
			 	<a href="#" class="asignarespecialidadEmpleados" >{{ $empleado->nombre.' '.$empleado->apellido1.' '.$empleado->apellido1 }}</a>
				<input type="hidden" value={{ $empleado->id }}>
			 </td>		
		</tr>
	@endforeach		
	</tbody>
</table>