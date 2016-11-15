<script>
	$(".borrarInstalacion").click(function(event) {
    	var instalacionId = $('input[type=hidden]', $(this).closest("tr")).val();
    	var token=$("input[name=_token]").val();

    	$.ajax({
	      	url: '/instalacionborrar/'+instalacionId,
      		headers:{'X-CSRF-TOKEN':token},      
	      	type: 'POST',
	      	dataType: 'json',
	    });

	 	$.get("/listarinstalaciones/"+$("#inst_tipo").val()+"", function(response,state){
        	$("#divlistarInstalaciones").empty().html(response);        
      	});
	});

	$(".editarInstalacion").click(function(event) {
    	var instalacionId = $('input[type=hidden]', $(this).closest("tr")).val();
    	mostrarInstalacion(instalacionId);
	});

	var mostrarInstalacion = function(id)
	{
		$.get("/admin/instalaciones/"+id+"/edit", function(data){
        	 $("#txtinstalacion").val(data.nombre);
        	 $("#txtcupo").val(data.cupo);
        	 $("#txtIdinstalacion").val(data.id);
        	 $("#txttipoinstalacion").val(data.inst_tipo_id);
      	});
	}

	$("#btnActualizarInstalacion").click(function(event) {
	 
	  var instalacionNombre= $("#txtinstalacion").val();
	  var instalacionId=$("#txtIdinstalacion").val();
	  var tipoInstalacion=$("#txttipoinstalacion").val();
	  var cupoInstalacion=$("#txtcupo").val();
	  var token=$("input[name=_token]").val();

	  $.ajax({
	      url: "/instalacionactualizar/"+instalacionId,
	      headers:{'X-CSRF-TOKEN':token},     
	      type: 'PUT',
	      dataType: 'json',
	      data: {id:instalacionId, nombre:instalacionNombre, cupo:cupoInstalacion, inst_tipo_id:tipoInstalacion},
	    });

	  	$.get("/listarinstalaciones/"+$("#inst_tipo").val()+"", function(response,state){
        	$("#divlistarInstalaciones").empty().html(response);
      	});
	});

	$(".asignarInstalacion").click(function(event) {
    	var instalacionId = $('input[type=hidden]', $(this).closest("tr")).val();
    	$("#instalacionId").val(instalacionId);

		$.get("/listarempleados/"+$("#role").val()+"", function(response,state){
        	$("#divlistarempleados").empty().html(response);        
      	});
	});

	$("#role").change(function(event) {
		$.get("/listarempleados/"+event.target.value+""+"", function(response,state){
        	$("#divlistarempleados").empty().html(response);        
      	});
	});	
  $(".instalacionNombre").click(function(event) {
      var instalacionId = $('input[type=hidden]', $(this).closest("tr")).val();
      $("#instalacionId").val(instalacionId);
      $.get("/listarinstalacionesempleado/"+instalacionId+"", function(response,state){
          $("#divlistarAsignaciones").empty().html(response);        
      });    
  });
</script>
<input type="hidden" id="instalacionId">
<table class="table table-striped">
	<thead>
		<tr>
			<td>Nombre</td>
			<td>Cupo</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
	@foreach ($instalacion as $instalacioni)
		<tr>
			<td>
				<input type="hidden" value={{ $instalacioni->id }}>				
        <a href="#" class="instalacionNombre">{{ $instalacioni->nombre }}</a>
			</td>
			<td>
				{{ $instalacioni->cupo }}				
			</td>
			<td>
				<a href="#" class="btn btn-danger btn-xs borrarInstalacion" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
        		<a href="#" class="btn btn-info btn-xs editarInstalacion" data-toggle="modal" data-target="#myModalEdit" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
        		<a href="#" class="btn btn-warning btn-xs asignarInstalacion" data-toggle="modal" data-target="#myModalAsig" data-placement="right" title="Asignar"><i class="fa fa-calendar"></i></a>
			</td>
		</tr>
	@endforeach		
	</tbody>
</table>

<style>
  .modal-header, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
    }
  .modal-footer {
      background-color: #f9f9f9;
    }
  </style>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Instalación</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
            <div class="row">
              <div class="col-sm-7">
              	<label for="txtInstalacion">Nombre</label>
                <input type="text" id="txtinstalacion" class="form-control" style="width: 100%">     
                <input type="hidden" id="txtIdinstalacion">        
                <input type="hidden" id="txttipoinstalacion">        
              </div>
              <div class="col-sm-2">
              	<label for="txtcupo">Cupo</label>
                <input type="number" id="txtcupo" class="form-control" style="width: 100%">             
              </div>
              <div class="col-sm-3">
              	<h2></h2>
                <button type="button" id="btnActualizarInstalacion" class="btn btn-success" data-dismiss="modal" title="Actualizar"><i class="fa fa- fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal de asignación -->
   <div class="modal fade" id="myModalAsig" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar Instalación</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
            <div class="row">
              <div class="col-sm-3">
              	<label for="diasSemana">Días de la semana</label>
              	<table id="tablediasemana">
              		<tbody>
              		@foreach ($diasemana as $diasemanai)
              			<tr>
              				<td>
              					<input type="checkbox" value={{ $diasemanai->id }}>
              					{{ $diasemanai->descripcion }}
              				</td>
              			</tr>
              		@endforeach              			
              		</tbody>
              	</table>
              </div>
              <div class="col-sm-3 form-group">
              	<label for="horai">Hora Inicial</label>
              	<input id="horai" type="time" class="form-control">
              	<label for="horaf">Hora Final</label>
              	<input id="horaf" type="time" class="form-control">
              	<label for="intervalo">Intérvalo en minutos</label>
              	<input id="intervalo" type="number" class="form-control" value="20">
              </div>
              <div class="col-sm-6">
              	<label for="">Personal médico</label>
    			{!! Form::select('role', $role,null, ['id' => 'role','class'=>'form-control']) !!}
    			<div id="divlistarempleados"></div>      	
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
  </div>

</div>