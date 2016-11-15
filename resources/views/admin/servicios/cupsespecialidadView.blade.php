<script>
	$(".borrarcupsespecialidad").click(function(event) {
    var cupsespecialidadId = $('input[type=hidden]', $(this).closest("tr")).val();
    
    $.ajax({
      url: '/cupsespecialidadborrar/'+cupsespecialidadId,
      type: 'GET',
      dataType: 'json',
    });

    var especialidadId=$('#especialidad_id').val();
    $.ajax({
        url: '/listarcupsespecialidad/'+especialidadId,
        type: 'GET',
        success:function(data){
          $("#divlistarcupsespecialidad").empty().html(data);
        },
        error:function(data){
          console.log('Error');
        }
    });
});
</script>

<table class="table table-striped">
	<tbody>
		@foreach ($cupsespecialidad as $cupsespecialidad1)
			<tr>
				<td>
					{{ $cupsespecialidad1->codigo }}
				</td>
				<td>
					{!! Form::hidden('servicio_id'.$cupsespecialidad1->id, $cupsespecialidad1->id ,['id'=>'servicio_id'.$cupsespecialidad1->id]) !!}	
			 		{{ $cupsespecialidad1->nombre }}
				</td>
				<td>
					<a href="#" id="borrarcupsespecialidad" class="btn btn-danger btn-xs borrarcupsespecialidad" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
				</td>
			</tr>
		@endforeach					
	</tbody>
</table>