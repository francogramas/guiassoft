<script type="text/javascript">
	$(".listarCups").click(function(event) {    
    $("#lblEspecialidad").text($(this).text());

    var especalidadId = $('input[type=hidden]', $(this).closest("td")).val();
    $("#especialidad_id").val(especalidadId);
    
    $.ajax({
      url: '/listarcupsespecialidad/'+especalidadId,
      type: 'GET',
      success:function(data){
        $("#divlistarcupsespecialidad").empty().html(data);
      },
      error:function(data){
        console.log('Error')
      }
    })
  });

$(".borrarespecialidad").click(function(event) {
    var especialidadId = $('input[type=hidden]', $(this).closest("tr")).val();
    
    $.ajax({
      url: '/especialidadborrar/'+especialidadId,
      type: 'GET',
      dataType: 'json',
    });

    var servicioId=$('#servicio_id').val();
    $.ajax({
        url: '/listarespecialidad/'+servicioId,
        type: 'GET',
        success:function(data){
          $("#divlistarespecialidad").empty().html(data);
        },
        error:function(data){
          console.log('Error');
        }
    });
});

$(".editarEspecialidad").click(function(event) {
    var especialidad = $('a', $(this).closest("tr")).text();  
    var especialidadId = $('input[type=hidden]', $(this).closest("tr")).val();    

    $("#txtEspecialidad").val(especialidad);
    $("#especialidad_id").val(especialidadId);    
});

$("#btnActualizarEspecialidad").click(function(event) {
  var especalidad= $("#txtEspecialidad").val();
  var especialidadId=$("#especialidad_id").val();
  var serviciosId=$("#servicio_id").val();

  var token=$("input[name=_token]").val();

  $.ajax({
      url: "/especialidadactualizar/"+especialidadId,
      headers:{'X-CSRF-TOKEN':token},     
      type: 'PUT',
      dataType: 'json',
      data: {id:especialidadId, nombre: especalidad, servicios_id: serviciosId},
    });

   var servicioId=$('#servicio_id').val();
    $.ajax({
        url: '/listarespecialidad/'+servicioId,
        type: 'GET',
        success:function(data){
          $("#divlistarespecialidad").empty().html(data);
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
	@foreach ($especialidad as $especalidadi)
		<tr>
			<td>
				{!! Form::hidden('especialidad_id'.$especalidadi->id, $especalidadi->id ,['id'=>'especialidad_id'.$especalidadi->id]) !!}					
				<a href="#" class="listarCups">{{ $especalidadi->nombre }}</a>
			</td>
			<td>
				<a href="#" id="borrarespecialidad" class="btn btn-danger btn-xs borrarespecialidad" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>				
        <a href="#" id="editarEspecialidad" class="btn btn-info btn-xs editarEspecialidad" data-toggle="modal" data-target="#myModalEsp" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
			</td>
		</tr>
		@endforeach		
	</tbody>
</table>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModalEsp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Especialidad</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
            <div class="row">
              <div class="col-sm-9">
                <input type="text" id="txtEspecialidad" class="form-control" style="width: 100%">             
              </div>
              <div class="col-sm-3">
                <button type="button" id="btnActualizarEspecialidad" class="btn btn-success" data-dismiss="modal"><i class="fa fa- fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>