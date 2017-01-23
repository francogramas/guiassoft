<script>
$(".borrarEtapa").click(function(event) {
      var etapashcId = $('input[type=hidden]', $(this).closest("tr")).val();
      var token=$("input[name=_token]").val();

      $.ajax({
          url: '/etapashcborrar/'+etapashcId,
          headers:{'X-CSRF-TOKEN':token},      
          type: 'POST',
          dataType: 'json',
      });

      $.get("/listaretapashc/"+"", function(response,state){
          $("#DivListaretapashc").empty().html(response);        
      });
  });	

$(".editarEtapa").click(function(event) {
    	var etapashcid = $('input[type=hidden]', $(this).closest("tr")).val();
    	mostraretapa(etapashcid);
	});

	var mostraretapa = function(id)
	{
		$.get("/hc/etapashc/"+id+"/edit", function(data){
        	 $("#txteditaretapashc").val(data.nombre);
        	 $("#idetapashc").val(data.id);
      	});
	};

$("#btnActualizarEtapasHc").click(function(event) {
	  var etapashcNombre= $("#txteditaretapashc").val();
	  var etapashcDescripcion='na';
	  var etapashcId=$("#idetapashc").val();
      var token=$("input[name=_token]").val();
	  
	  $.ajax({
	      url: "/etapashcactualizar/"+etapashcId,
	      headers:{'X-CSRF-TOKEN':token},     
	      type: 'PUT',
	      dataType: 'json',
	      data: {id:etapashcId, nombre:etapashcNombre, descripcion:etapashcDescripcion},
	    });

	  	 $.get("/listaretapashc/"+"", function(response,state){
          $("#DivListaretapashc").empty().html(response);        
      });
	});
</script>
<table class="table">
	<thead>
		<tr>
			<td><b>Etapa</b></td>
			<td><b></b></td>
		</tr>
	</thead>
	<tbody>
	@foreach ($etapashc as $etapashci)
		<tr>
			<td>
				{{ $etapashci->nombre }}
				<input type="hidden" value={{ $etapashci->id }}>
			</td>
			<td>
				<a href="#" id="borrarEtapa" class="borrarEtapa btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
				<a href="#" id="editarEtapa" class="editarEtapa btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

