<script>
$(".borrarItems").click(function(event) {
      var ItemshcId = $('input[type=hidden]', $(this).closest("tr")).val();
      var token=$("input[name=_token]").val();
      var _etapashcespecialidad_id=$('#hdnidetapashcespecialidad').val();


      $.ajax({
          url: '/itemshcborrar/'+ItemshcId,
          headers:{'X-CSRF-TOKEN':token},      
          type: 'POST',
          dataType: 'json',
      });

       $.get("/listaritemshc/"+_etapashcespecialidad_id+"", function(response,state){
          $("#DivListaritemshc").empty().html(response);        
      });
  });	

$(".editarItems").click(function(event) {
    	var _itemshc_id = $('input[type=hidden]', $(this).closest("tr")).val();
    	mostrarItemhc(_itemshc_id);
	});

	var mostrarItemhc = function(id)
	{
		$.get("/hc/mostraritemshc/"+id+"", function(data){
        	 $("#txteditarItems").val(data.nombre);
        	 $("#EditaritemSugerencia").val(data.sugerencia);
        	 $("#editaritemtype").val(data.type);
        	 $("#idItemshc").val(data.id);
      	});
	};

$("#btnActualizarItems").click(function(event) {
	  var _nombre= $("#txteditarItems").val();
	  var _etapashcespecialidad_id=$('#hdnidetapashcespecialidad').val();
	  var _sugerencia=$('#EditaritemSugerencia').val();
	  var _type=$('#editaritemtype').val();
	  var _id=$("#idItemshc").val();
      var token=$("input[name=_token]").val();
	  
	  $.ajax({
	      url: "/itemshcactualizar/"+_id,
	      headers:{'X-CSRF-TOKEN':token},     
	      type: 'PUT',
	      dataType: 'json',
	      data: {nombre:_nombre, etapashcespecialidad_id:_etapashcespecialidad_id, sugerencia:_sugerencia, type:_type},
	    });

	  	$.get("/listaritemshc/"+_etapashcespecialidad_id+"", function(response,state){
          $("#DivListaritemshc").empty().html(response);        
      });
	});
</script>
<table class="table">
	<thead>
		<tr>
			<td><b>Item</b></td>
			<td><b>Sugerencia</b></td>
			<td><b>Tipo de dato</b></td>
			<td><b></b></td>
		</tr>
	</thead>
	<tbody>
	@foreach ($itemshc as $itemshci)
		<tr draggable="true">
			<td>
				{{ $itemshci->nombre }}
				<input type="hidden" value={{ $itemshci->id }}>
			</td>
			<td> {{ $itemshci->sugerencia }}</td>
			<td> {{ $itemshci->type }} </td>
			<td>
				<a href="#" id="borrarItems" class="borrarItems btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
				<a href="#" id="editarItems" class="editarItems btn btn-info btn-xs" data-toggle="modal" data-target="#myModalItems" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>