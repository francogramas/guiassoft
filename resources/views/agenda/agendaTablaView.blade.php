<script>
llenarAgenda();

function llenarAgenda(){
    //-----------------------------------------------cargar el listado de la agenda---------------------------------------------------------------------
  var _fecha = $("#fechaAgenda").val();
  var _empleados_id = $("#especialidadespecialista").val();
  $.get('/mostrarcita/'+_fecha+'/'+_empleados_id, function(response,state){        
    $(".listarCita").empty();
    $(".estadoCita").empty();
    $(".contrato").empty();
    $(".razonsocial").empty();    $(".edad").empty();
    $(".botones").empty();

    for (i = 0; i < response.length; i++) {  
      $("#listarCita"+response[i].horareferencia_id).append("<div class='inDiv'>"+ response[i].nombre1 + " " + response[i].nombre2 +" " + response[i].apellido1 + " " +response[i].apellido2 + "</div>");
      $("#estadoCita"+response[i].horareferencia_id).append("<div class='inDiv " + response[i].estado.replace(" ","_") + "'>"+ response[i].estado + "</div>");
      $("#razonsocial"+response[i].horareferencia_id).append("<div class='inDiv'>"+ response[i].razonsocial + "</div>");
      $("#edad"+response[i].horareferencia_id).append("<div class='inDiv'>"+getAge(response[i].nacimiento) + "</div>");
      $("#contrato"+response[i].horareferencia_id).append("<div class='inDiv'>"+response[i].contrato + "</div>");
      $("#botones"+response[i].horareferencia_id).append("<div class='inDiv'>"+"<button class='btn btn-xs btn-danger' onclick='cambiarCita("+ response[i].id +",4)' data-toggle='tooltip' data-placement='right' title='Cancelar Cita'> <i class='fa fa-times'></i> </button> <button class='btn btn-xs btn-info'  data-toggle='tooltip' data-placement='right' title='Ver Cita'> <i class='fa fa-eye'></i> </button> <button class='btn btn-xs btn-success' onclick='cambiarCita("+ response[i].id +",2)' data-toggle='tooltip' data-placement='right' title='Habilitar Cita'> <i class='fa fa-reply'></i> </button>"+"</div>");
    }
  });  
};
//--------------------------------------------- Guardar la cita------------------------------------------------------------------------

$(".agendarCita").click(function(event) {
    var ambito_id = $('input[id=instalacionId]', $(this).closest("tr")).val();
    var IdHora = $('input[id=IdHora]', $(this).closest("tr")).val();
		
 		var _fecha = $("#fechaAgenda").val();
 		var _hora = $(this).val();
 		var _agendaestado_id = 1;
 		var _pacientes_id = $("#idPaciente").val();
 		var _empleados_id = $("#especialidadespecialista").val();
 		var _seguromedico_id = $("#seguroMedico").val();
 		var _contratos_id = $("#contrato").val();
 		var _especialidad_id= $("#cmbEspecialidadServicio").val();
   	var _instalacion_id = $('input[id=instalacionId]', $(this).closest("tr")).val();
   	var _tipousuario_id = $("#tipousuario").val();
   	var _users_id =1;
   	var token=$("input[name=_token]").val();
    //------------------------guarda la cita
   $.ajax({
   		url: '/agendaCrear/',
   		headers:{'X-CSRF-TOKEN':token},
   		type: 'POST',
   		dataType: 'json',
   		data: {fecha: _fecha, hora: _hora, agendaestado_id: _agendaestado_id, pacientes_id: _pacientes_id, empleados_id: _empleados_id, seguromedico_id: _seguromedico_id, contratos_id: _contratos_id, especialidad_id: _especialidad_id, instalacion_id: _instalacion_id, tipousuario_id: _tipousuario_id, users_id:_users_id},
    })
    .fail(function() {
    	console.log("error");
  });
    $("#idPaciente").val("0");
    $("#agePaciente").val("");
    $("#edad").val("");

      //---------------lista todos las citas
    llenarAgenda();
});

//--------------------------------------------------------------------------
function cambiarCita (_id,_estado) {
  var token=$("input[name=_token]").val();  
  $.ajax({
      url: "/cambiarestadoCita/"+_estado+"/"+_id,
      headers:{'X-CSRF-TOKEN':token},
      type: 'PUT',
      dataType: 'json',
      data: {cita:_id, estado: _estado},
    });
  console.log(_estado+" "+_id);
  llenarAgenda();
}

//------------------------------------------------------ ccalculos de edad
  function getAge(dateString) {
  dateString=formatDate(dateString);

  var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());

  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();
 //date must be mm/dd/yyyy
  var dob = new Date(dateString.substring(6,10),
                     dateString.substring(0,2)-1,                   
                     dateString.substring(3,5)                  
                     );


  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";

  yearAge = yearNow - yearDob;

  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }

  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;

    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };

  if ( age.years > 1 ) yearString = " Años";
  else yearString = " Año";
  if ( age.months> 1 ) monthString = " Meses";
  else monthString = " Mes";
  if ( age.days > 1 ) dayString = " Días";
  else dayString = " Día";


  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString;
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.days + dayString;
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString;
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString;
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString;
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString;
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString;
  else ageString = "Oops! No se puede calular la edad!";

  return ageString;
}

  function formatDate(inStr){
    if((typeof inStr == 'undefined') || (inStr == null) || 
      (inStr.length <= 0)) {
    return '';
  }
  var year = inStr.substring(0, 4);
  var month = inStr.substring(5, 7);
  var day = inStr.substring(8, 10);
  return month + '/' + day + '/' + year;
  };
</script>
<style type="text/css" media="screen">
  .inDiv{
    height: 24px;
  }
</style>
<table id="tablaAgenda" class="table table-striped" style="font-size: 10pt;">
	<thead>
		<tr>
			<td style="width: 75px;">Hora</td>
			<td>Instalacion</td>
			<td>Listado</td>
      <td>Edad</td>
      <td>Estado</td>      
      <td>Seguro Médico</td>
      <td>Contrato</td>
			<td style="width: 120px;"></td>
		</tr>
	</thead>
	<tbody>
		@foreach ($agenda as $agendai)
		<tr>
			<td> 
        <button id="btnHora" class="btn btn-xs btn-primary btn-outline agendarCita" title="Asignar Cita" value={{ $agendai->Hora }} > {{ $agendai->Hora }} </button> </td>
			<td>
        {{ $agendai->InstalacionN }}
				<input id="instalacionId" type="hidden" value={{ $agendai->Instalacion_id }}>
			</td>
			<td>
				<div class="listarCita" id={{'listarCita'.$agendai->id }}></div>
			</td>
      <td>
        <div class="edad" id={{'edad'.$agendai->id }}></div>        
      </td>
      <td>
        <div class="estadoCita" id={{'estadoCita'.$agendai->id }}></div>
      </td>
      <td>
        <div class="razonsocial" id={{'razonsocial'.$agendai->id }}></div>        
      </td>
      <td>
        <div class="contrato" id={{'contrato'.$agendai->id }}></div>        
      </td>
			<td>
        <div class="botones" id={{'botones'.$agendai->id }}></div>				
			</td>
		</tr>
		@endforeach		
	</tbody>
</table>