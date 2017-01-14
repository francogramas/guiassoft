<script>
	//--------------------------------------Borrar Antecedente----------------------------
  $(".borrarAntecedente").click(function(event) {
      var antecedenteId = $('input[type=hidden]', $(this).closest("tr")).val();
      var token=$("input[name=_token]").val();

     
      $.ajax({
          url: '/antecedenteborrar/'+antecedenteId,
          headers:{'X-CSRF-TOKEN':token},      
          type: 'POST',
          dataType: 'json',
      });

      var antecedenteclase_id = $('#claseId').val();
      $.ajax({
        url: '/listarantecedentes/' + antecedenteclase_id + "",
        type: 'GET',
        success:function(data){
          $("#admAntecedentes").empty().html(data);
        },
        error:function(data){
          console.log('Error');
        }
    });
  });

//-----------------------------------Antecedentes Creary--------------------------------------------------
  $('#agregarAntecedente').click(function(event) {
    var _antecedenteclase_id=$('#claseId').val();
    var _nombre=$('#antecedenteNombre').val();
    var _type=$('#antecedentetype').val();
    var _sugerencia=$('#antecedenteSugerencia').val();
    var token=$("input[name=_token]").val();
    var route='/antecedenteCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {nombre: _nombre, antecedenteclase_id: _antecedenteclase_id, type:_type, sugerencia:_sugerencia},
      success:function(data){
        if (data.success='true'){
            console.log('Hecho')
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
    listarAntecedente(_antecedenteclase_id);
  });
  
  $(".editarAntecedente").click(function(event) {
    var antecedenteId = $('input[type=hidden]', $(this).closest("tr")).val();
  	$("#txtIdAntecedenteEdit").val(antecedenteId);
  	 $.get("/hc/antecedente/"+antecedenteId+"", function(response,state){
        $("#antecedenteNombreEdit").val(response.nombre);        
        $("#antecedenteSugerenciaEdit").val(response.sugerencia);
        $("#antecedentetypeEdit").val(response.type);        
      });
  });

  $("#btnActualizarAntecedente").click(function(event) {
    var antecedenteId = $("#txtIdAntecedenteEdit").val();
    var _antecedenteclase_id=$('#claseId').val();
    var _nombre=$('#antecedenteNombreEdit').val();
    var _type=$('#antecedentetypeEdit').val();
    var _sugerencia=$('#antecedenteSugerenciaEdit').val();
    var token=$("input[name=_token]").val();
    var route='/antecedenteactualizar/'+antecedenteId;
    console.log(_nombre);

    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'put',
      dataType: 'json',
      data: {nombre: _nombre, antecedenteclase_id: _antecedenteclase_id, type:_type, sugerencia:_sugerencia},
      success:function(data){
        if (data.success='true'){
            console.log('Hecho')
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
    listarAntecedente(_antecedenteclase_id);
  });

  function listarAntecedente(_antecedenteclase_id){
  	$.ajax({
        url: '/listarantecedentes/' + _antecedenteclase_id + "",
        type: 'GET',
        success:function(data){
          $("#admAntecedentes").empty().html(data);
        },
        error:function(data){
          console.log('Error');
        }
    });
  }
</script>

<h4>Administrar antecedentes</h4>
		<div>
			<ul class="list-inline">
				 <li>
					<input type="text" id="antecedenteNombre" class="form-control" placeholder="Agregar antecedente">	
			  	</li>
			  	<li>
			  		<input type="text" id="antecedenteSugerencia" class="form-control" placeholder="Sugerencia">
				</li>
				<li>
					<select name="antecedentetype" id="antecedentetype" class="form-control">
				  		<option value="text">Texto</option>
						<option value="number">Numérico</option>
			  			<option value="date">Fecha</option>
			  			<option value="email">Correo</option>
			  		</select>
			  	</li>
			  	<li>
					<a href="#" id="agregarAntecedente" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar antecedente"><i class="fa fa-plus"></i></a>
			  	</li>
			</ul>
		</div>			
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td><h4>{{ $clase{'nombre'} }}</h4></td>
						<td><h4>Sugerencia</h4></td>
						<td><h4>Tipo</h4></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				@foreach ($antecedentes as $antecedente)
					<tr>
						<td>
							{{ $antecedente->nombre }}
							<input type="hidden" value={{ $antecedente->id }}>
						</td>
						<td>
							{{ $antecedente->sugerencia }}

						</td>
						<td>
							{{ $antecedente->type }}							
						</td>
						<td>
							<a href="#" class="btn btn-danger btn-xs borrarAntecedente" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
        					<a href="#" class="btn btn-info btn-xs editarAntecedente" data-toggle="modal" data-target="#myModalEdit" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

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
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar antecedente</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
            <div class="row">
              <div class="col-sm-9">
	             <ul class="list-inline">
					<li>
						<label for="">Nombre</label>
						<input type="text" id="antecedenteNombreEdit" class="form-control" placeholder="Agregar antecedente">	
                		<input type="hidden" id="txtIdAntecedenteEdit"> 
				  	</li>
				  	<li>
				  	<label for="antecedenteSugerenciaEdit">Sugerencia</label>
				  		<input type="text" id="antecedenteSugerenciaEdit" class="form-control" placeholder="Sugerencia">
					</li>
					<li>
					<label for="antecedentetypeEdit">Tipo de datos</label>
						<select name="antecedentetypeEdit" id="antecedentetypeEdit" class="form-control">
					  		<option value="text">Texto</option>
							<option value="number">Numérico</option>
				  			<option value="date">Fecha</option>
				  			<option value="email">Correo</option>
				  		</select>
				  	</li>		
				</ul>     
              </div>       
              <div class="col-sm-3">
              	<h2></h2>
                <button type="button" id="btnActualizarAntecedente" class="btn btn-success" data-dismiss="modal" title="Actualizar"><i class="fa fa- fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
