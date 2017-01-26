<script type="text/javascript">
	//-----------------------------------------Borrar etapashcEspecialidad
  $(".borrarEtapaEspecialiadad").click(function(event) {
    var etapashcespecialidadId = $('input[type=hidden]', $(this).closest("tr")).val();
    var _cupsespecialidad_id=$('#CmbCupsEspecialidad').val();
      
      var token=$("input[name=_token]").val();

      $.ajax({
          url: '/etapashcespecialidadborrar/'+etapashcespecialidadId,
          headers:{'X-CSRF-TOKEN':token},      
          type: 'POST',
          dataType: 'json',
      });

      $.get("/listaretapashcespecialidad/"+_cupsespecialidad_id+"", function(response,state){
          $("#DivListarEtapashcEspecialidad").empty().html(response);        
      });
  });
   //-------------------------------------------------------Listar Items de etapas
  $(".etapashcespecialidad").click(function(event) {
      var _etapashcespecialidad_id = $('input[type=hidden]', $(this).closest("tr")).val();
      $("#lblEtapa").text($(this).text());   
      $("#hdnidetapashcespecialidad").val(_etapashcespecialidad_id);   
       $.get("/listaritemshc/"+_etapashcespecialidad_id+"", function(response,state){
          $("#DivListaritemshc").empty().html(response);        
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
	@foreach ($etapashcespecialidad as $etapashci)
		<tr draggable="true">
			<td>				
				<a href="#" id="etapashcespecialidad" class="etapashcespecialidad">{{ $etapashci->nombre }}</a>
				<input type="hidden" value={{ $etapashci->id }}>
			</td>
			<td>
				<a href="#" id="borrarEtapaEspecialiadad" class="borrarEtapaEspecialiadad btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>