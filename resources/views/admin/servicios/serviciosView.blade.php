<script type="text/javascript">
	$(".listarEspecialidad").click(function(event) {    
    $("#lblServicio").text($(this).text());

    var servicioId = $('input[type=hidden]', $(this).closest("td")).val();
    $("#servicio_id").val(servicioId);
    
    $.ajax({
      url: '/listarespecialidad/'+servicioId,
      type: 'GET',
      success:function(data){
        $("#divlistarespecialidad").empty().html(data);        
        $("#divlistarcupsespecialidad").empty();
      },
      error:function(data){
        console.log('Error')
      }
    })
  });

	$(".borrarservicios").click(function(event) {
    var servicio_id = $('input[type=hidden]', $(this).closest("tr")).val();
    
    $.ajax({
      url: '/serviciosborrar/'+servicio_id,
      type: 'GET',
      dataType: 'json',
    });
    var ambito_id=$('#ambitoprocedimiento_id').val();
   $.ajax({
       url: '/listarservicios/'+ambito_id,
       type: 'GET',
       success:function(data){
         $("#divlistarservicios").empty().html(data);
       	},
       error:function(data){
         console.log('Error');
   		}
	}); 
  });

$(".editarServicio").click(function(event) {
    var servicio = $('a', $(this).closest("tr")).text();	
    var servicioId = $('input[type=hidden]', $(this).closest("tr")).val();    

    $("#txtServicio").val(servicio);
    $("#servicio_id").val(servicioId);    
});

$("#btnActualizarServicio").click(function(event) {
	var servicio= $("#txtServicio").val();
	var servicioId=$("#servicio_id").val();
	var ambitoId=$("#ambitoprocedimiento_id").val();

    var token=$("input[name=_token]").val();

	$.ajax({
    	url: "/serviciosactualizar/"+servicioId,
      	headers:{'X-CSRF-TOKEN':token},    	
    	type: 'PUT',
    	dataType: 'json',
    	data: {id:servicioId, nombre: servicio, ambitoprocedimiento_id: ambitoId},
    });

    var ambito_id=$('#ambitoprocedimiento_id').val();
   $.ajax({
       url: '/listarservicios/'+ambito_id,
       type: 'GET',
       success:function(data){
         $("#divlistarservicios").empty().html(data);
       	},
       error:function(data){
         console.log('Error');
   		}
	});
});

</script>
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
<table class="table table-striped">
	<tbody>
		@foreach ($servicios as $servicio1)
			<tr>
				<td>
					{!! Form::hidden('servicio_id'.$servicio1->id, $servicio1->id ,['id'=>'servicio_id'.$servicio1->id]) !!}	
			 		<a class="listarEspecialidad" href="#">{{ $servicio1->nombre }}</a>
				</td>
				<td>
					<a href="#" id="borrarServicio" class="btn btn-danger btn-xs borrarservicios" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
					<a href="#" id="editarServicio" class="btn btn-info btn-xs editarServicio" data-toggle="modal" data-target="#myModal" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a> 
				</td>
			</tr>
		@endforeach					
	</tbody>
</table>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"  	>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Servicio</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
	          <div class="row">
	          	<div class="col-sm-9">
	          		<input type="text" id="txtServicio" class="form-control" style="width: 100%">          		
	          	</div>
	          	<div class="col-sm-3">
	          		<button type="button" id="btnActualizarServicio" class="btn btn-success" data-dismiss="modal"><i class="fa fa- fa-check"></i></button>
	          	</div>
	          </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>