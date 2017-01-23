$(document).on("change", "#datepicker", function () {
	$("#fechaAgenda").val($(this).val());
	$.ajax({
	      url: '/listaragenda/'+$("#especialidadespecialista").val()+'/'+$("#fechaAgenda").val()+"",
	      type: 'GET',
	      success:function(data){
	        $("#agendaListado").empty();
	        $("#agendaListado").empty().html(data);
	      },
	      error:function(data){
	        console.log('Error')
	      }
	    });
});

$(document).ready(function(){
	//------------------- Colocar la fecha
	var now = new Date();
	var month=now.getMonth()+1;
	var fecha= now.getFullYear()+'-'+month+'-'+now.getDate();
	$("#fechaAgenda").val(fecha);
	$( "#datepicker").datepicker({autoSize: true, dateFormat: "yy-mm-dd", });

  //------------------------------ Autompetar pacientes
  $("#agePaciente").autocomplete({
    source: "/buscar/pacientes",
    minLength: 1,
    select: function(event, ui) {
      $('#agePaciente').val(ui.item.value);
      $('#idPaciente').val(ui.item.id);
      $('#sexo').val(ui.item.sexo);
      $('#edad').val(getAge(ui.item.nacimiento));

	    $.get("/mostrar/pacientes/"+ui.item.id+"", function(response,state){
	          $("#pacientesCard").empty().html(response);
	      });

      $.get("/mostrar/pacientesCitas/"+ui.item.id+"", function(response,state){
            $("#agendaHistorial").empty().html(response);
        });
	    $('#agePaciente').val(ui.item.value);
      $('#idPaciente').val(ui.item.id);
      $('#sexo').val(ui.item.sexo);
      $('#edad').val(getAge(ui.item.nacimiento));

    }
   });
     $("#agePaciente").click(function(){
     $("#agePaciente").val("");
     $('#idPaciente').val("0");
  });
//--------------------Llenar todos los cmb que hacen parte de ambitos de procedimientos

$("#cmbAmbito").change(function(event) {
  $.get("/listar/servicios/"+event.target.value+"", function(response,state){
      $("#cmbServicios").empty();
      $("#cmbEspecialidadServicio").empty();
      $("#CmbCupsEspecialidad").empty();
      $("#DivListarEtapashcEspecialidad").empty();
      $("#DivListaritemshc").empty();

      for (i = 0; i < response.length; i++) {
          $("#cmbServicios").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
        }

      if (response.length>0){
        $.get("/listar/especialidad/"+response[0].id+"", function(response,state){
          for (i = 0; i < response.length; i++) {
            $("#cmbEspecialidadServicio").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
          }

          if (response.length>0){
              $.get("/listar/cupsespecialidad/"+response[0].id+"", function(response,state){
                  $.get("/listaretapashcespecialidad/"+response[0].id+"", function(response,state){
                    $("#DivListarEtapashcEspecialidad").empty().html(response);
                  });
              for (i = 0; i < response.length; i++) {
                $("#CmbCupsEspecialidad").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
              }
            });
          };

        });
      }
  });
});

//------------------------------------Llenar cmb servicios
 $("#cmbServicios").change(function(event){
      $.get("/listar/especialidad/"+event.target.value+"", function(response,state){
        $("#cmbEspecialidadServicio").empty();
        $("#especialidadespecialista").empty();
        $("#CmbCupsEspecialidad").empty();
        $("#DivListarEtapashcEspecialidad").empty();
        $("#DivListaritemshc").empty();



        if (response.length>0){
          $.get("/listar/especialidadempleados/"+response[0].id+"", function(response,state){
            for (i = 0; i < response.length; i++) {
              $("#especialidadespecialista").append("<option value='" + response[i].id+ "'>" + response[i].nombre  + " " + response[i].apellido1  + " " + response[i].apellido2 + "</option>")
            }
          });
        }
        for (i = 0; i < response.length; i++) {
          $("#cmbEspecialidadServicio").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
        }
        if (response.length>0){
              $.get("/listar/cupsespecialidad/"+response[0].id+"", function(response,state){
                $.get("/listaretapashcespecialidad/"+response[0].id+"", function(response,state){
                   $("#DivListarEtapashcEspecialidad").empty().html(response);
                });
              for (i = 0; i < response.length; i++) {
                $("#CmbCupsEspecialidad").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
              }
            });
          };
      });
    });
//-------------------------------------- Llenar Cups

$("#cmbEspecialidadServicio").change(function(event){
      $("#CmbCupsEspecialidad").empty();
      $("#DivListarEtapashcEspecialidad").empty();
      $("#DivListaritemshc").empty();
      
      $.get("/listar/cupsespecialidad/"+event.target.value+"", function(response,state){        
        $.get("/listaretapashcespecialidad/"+response[0].id+"", function(response,state){
            $("#DivListarEtapashcEspecialidad").empty().html(response);
        });
        for (i = 0; i < response.length; i++) {
          $("#CmbCupsEspecialidad").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
        }
      });
    });

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

  $("#cmbEspecialidadServicio").change(function(event) {
     $.get("/listar/especialidadempleados/"+event.target.value+"", function(response,state){
        $("#especialidadespecialista").empty();
        for (i = 0; i < response.length; i++) {
          $("#especialidadespecialista").append("<option value='" + response[i].id+ "'>" + response[i].nombre  + " " + response[i].apellido1  + " " + response[i].apellido2 + "</option>")
        }
      });
  });

	$("#especialidadespecialista").change(function(event) {
	    $.ajax({
	      url: '/listaragenda/'+event.target.value+'/'+$("#fechaAgenda").val()+"",
	      type: 'GET',
	      success:function(data){
	        $("#agendaListado").empty();
	        $("#agendaListado").empty().html(data);
	      },
	      error:function(data){
	        console.log('Error')
	      }
	    });
	});


	$.ajax({
	      url: '/listaragenda/'+$("#especialidadespecialista").val()+'/'+$("#fechaAgenda").val()+"",
	      type: 'GET',
	      success:function(data){
	        $("#agendaListado").empty();
	        $("#agendaListado").empty().html(data);
	      },
	      error:function(data){
	        console.log('Error');
	      }
	    });
});