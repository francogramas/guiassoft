<script>
	$(".AsignarEmpleadpInstalacion").click(function(event) {
    	var empleadoId = $('input[type=hidden]', $(this).closest("tr")).val();

    	$("#tablediasemana tbody tr").each(function (index) 
        {        	
            var campo1, campo2, campo3;
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0:     					
    					var chk = $('input[type=checkbox]', $(this).closest("tr")).prop('checked');
    					if (chk==true){
            				var horai1=$("#horai").val();
            				var horaf1=$("#horaf").val();
            				var intervalo1=$("#intervalo").val();
            				var diasemana_id1=$('input[type=checkbox]', $(this).closest("tr")).val();
            				var empleados_id1=empleadoId;
            				var instalacion_id1=$("#instalacionId").val();
    						var token=$("input[name=_token]").val();

            				$.ajax({
            					url: '/instalacionEmpleadoCrear',
      							headers:{'X-CSRF-TOKEN':token},      
            					type: 'post',
            					dataType: 'json',
            					data: {horai:horai1, horaf:horaf1, intervalo:intervalo1, diasemana_id:diasemana_id1, empleados_id: empleados_id1, instalacion_id:instalacion_id1},
            				})
            				.done(function() {
            					
            				})
            				.fail(function() {
            					console.log("error");
            				});            				
    					};
    					
                    break;                    
                }
                $(this).css("background-color", "#ECF8E0");
            })
        });
        
        $.get("/listarinstalacionesempleado/"+$("#instalacionId").val()+"", function(response,state){
          $("#divlistarAsignaciones").empty().html(response);        
      });
	});

</script>
<table class="table table-striped">
	<tbody>
	@foreach ($empleados as $empleado)
		<tr>
			<td>
				<input type="hidden" value={!! $empleado->id !!}>
				{!! $empleado->nombre." ".$empleado->apellido1." ".$empleado->apellido2 !!}
			</td>
			<td>
				<a href="#" class="btn btn-success btn-xs AsignarEmpleadpInstalacion" data-toggle="tooltip" data-placement="right" title="Asignar"><i class="fa fa-check"></i></a>
			</td>
		</tr>
	@endforeach		
	</tbody>
</table>