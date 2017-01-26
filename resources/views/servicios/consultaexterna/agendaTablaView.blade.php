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
    $(".razonsocial").empty();
    $(".edad").empty();
    $(".botones").empty();

    for (i = 0; i < response.length; i++) {  
      $("#listarCita"+response[i].horareferencia_id).append("<div class='inDiv'>"+ response[i].nombre1 + " " + response[i].nombre2 +" " + response[i].apellido1 + " " +response[i].apellido2 + "</div>");
      $("#estadoCita"+response[i].horareferencia_id).append("<div class='inDiv " + response[i].estado.replace(" ","_") + "'>"+ response[i].estado + "</div>");
      $("#razonsocial"+response[i].horareferencia_id).append("<div class='inDiv'>"+ response[i].razonsocial + "</div>");
      $("#edad"+response[i].horareferencia_id).append("<div class='inDiv'>"+getAge(response[i].nacimiento) + "</div>");
      $("#contrato"+response[i].horareferencia_id).append("<div class='inDiv'>"+response[i].contrato + "</div>");
      $("#botones"+response[i].horareferencia_id).append("<div class='inDiv'>"+"<button class='btn btn-xs btn-success' onclick='cambiarCita("+ response[i].id +",6)' data-toggle='tooltip' data-placement='right' title='Atender'> <i class='fa fa-play-circle-o'></i> </button> <button class='btn btn-xs btn-info'  data-toggle='tooltip' data-placement='right' title='Ver Cita'> <i class='fa fa-eye'></i> </button> <button class='btn btn-xs btn-warning' onclick='cambiarCita("+ response[i].id +",2)' data-toggle='tooltip' data-placement='right' title='Agregar nota aclaratoria'> <i class='fa fa-book'></i> </button>"+"</div>");
    }
  });  
};

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
  if (_estado==6){
    $("#agendaListadoconsultaexterna").empty();
    console.log('la');
  }
  else
  {
    llenarAgenda();
  }
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
<div class="panel panel-info">
  <div class="panel-heading">Agenda</div>
  <div class="panel-body">
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
            <button id="btnHora"   class="btn btn-xs btn-primary btn-outline agendarCita" title="Hora" value={{ $agendai->Hora }} > {{ $agendai->Hora }} </button> </td>
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
  </div>
</div>
