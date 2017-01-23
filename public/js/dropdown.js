$(document).ready(function(){
    $("#paises").change(function(event){
  		$.get("/departamentos/"+event.target.value+"", function(response,state){
  			$("#departamentos").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#departamentos").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});
    });

     $("#departamentos").change(function(event){
  		$.get("/ciudades/"+event.target.value+"", function(response,state){
  			$("#ciudad_id").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#ciudad_id").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});
    });

  $(function()
  {
     $("#buscarP").autocomplete({
      source: "/buscar/producto",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarP').val(ui.item.value);
        $('#producto_id').val(ui.item.id);
      }
    });
      $("#buscarP").click(function(){
      $("#buscarP").val("");
    });
  });

  $(function() {
     $("#buscarTercero").autocomplete({
      source: "/buscar/tercero",
      minLength: 1,
      select: function(event, ui) {
        $('#buscarTercero').val(ui.item.value);
        $('#tercero_id').val(ui.item.id);
      }
    });
     $("#buscarTercero").click(function(){
      $("#buscarTercero").val("");
    });
  });

  
  $('.respuestas').hover(function() {
    var respuesta_id= $(this).attr("value");
    $("#respuesta_id").val(respuesta_id);
  }, function() {
    /* Stuff to do when the mouse leaves the element */
  });

  $('.btn-delete').click( function(e){
    e.preventDefault();
    var row = $(this).parents('tr');
    var id=row.data('id');
    var form = $('#form-delete');

    var url=form.attr('action').replace(':DETALLE_ID',id);
    var data=form.serialize();

    $.post(url,data, function(result){
      row.fadeOut();
      alert(result);
    }).fail(function(){
      alert('El registro no se pudo eliminar');
    });
  });

  $('[data-toggle="tooltip"]').tooltip();

  //---------------------------------------------- Agregar servicio
  $('#agregarServicio').click(function(event) {  
    var name=$('#servicioNombre').val();
    var ambito_id=$('#ambitoprocedimiento_id').val();
    var token=$("input[name=_token]").val();
    var route='/serviciosCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {nombre: name, ambitoprocedimiento_id: ambito_id},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });

    $.ajax({
      url: '/listarservicios/'+ambito_id,
      type: 'GET',
      success:function(data){
        $("#divlistarservicios").empty().html(data);
      },
      error:function(data){
        console.log('Error')
      }
    });
  });

  //---------------------------------------------- Agregar Especialidad
  $('#agregarEspecialidad').click(function(event) {  
    var name=$('#especilidadNombre').val();
    var serviciosId=$('#servicio_id').val();
    var token=$("input[name=_token]").val();
    var route='/especialidadCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {nombre: name, servicios_id: serviciosId},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });

    $.ajax({
      url: '/listarespecialidad/'+serviciosId,
      type: 'GET',
      success:function(data){
        $("#divlistarespecialidad").empty().html(data);
      },
      error:function(data){
        console.log('Error')
      }
    });
  });

//---------------------------------------------- Agregar etapas Hc
  $('#guardarEtapaHc').click(function(event) {
    var _nombre=$('#txtEtapa').val();
    var _descripcion='na';
    var token=$("input[name=_token]").val();
    var route='/etapashcCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {nombre: _nombre, descripcion:_descripcion},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
     $.get("/listaretapashc/"+"", function(response,state){
          $("#DivListaretapashc").empty().html(response);        
      });
  });

  //------------------------------------- Listar Servicios
$(".listarServicios").click(function(event) {    
    var ambito_id = $('input[type=hidden]', $(this).closest("td")).val();

    $("#lblAmbito").text($(this).text());
    $("#ambitoprocedimiento_id").val(ambito_id);

    $.ajax({
      url: '/listarservicios/'+ambito_id,
      type: 'GET',
      success:function(data){
        $("#divlistarespecialidad").empty();
        $("#divlistarcupsespecialidad").empty();
        $("#divlistarservicios").empty().html(data);
      },
      error:function(data){
        console.log('Error')
      }
    });
  });

//------------------------------ Autompetar Cups
$(function()
    {
       $("#cupsespecialidadnombre").autocomplete({
        source: "/buscar/cups",
        minLength: 1,
        select: function(event, ui) {
          $('#cupsespecialidadnombre').val(ui.item.value);
          $('#cupscodigo').val(ui.item.codigo);
        }
      });
        $("#cupsespecialidadnombre").click(function(){
        $("#cupsespecialidadnombre").val("");
        $('#cupscodigo').val("0");

      });
    });

//---------------------------------------------- Agregar Especialidad
  $('#agregarCupsespecialidad').click(function(event) {      
    var especialidadId=$('#especialidad_id').val();
    var cupsCodigo=$('#cupscodigo').val();
    var token=$("input[name=_token]").val();
    var route='/cupsespecialidadCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {especialidad_id: especialidadId, cups_codigo: cupsCodigo},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });

    $.ajax({
      url: '/listarcupsespecialidad/'+especialidadId,
      type: 'GET',
      success:function(data){
        $("#divlistarcupsespecialidad").empty().html(data);
      },
      error:function(data){
        console.log('Error')
      }
    });
  });
//------------------------------------------------------------ llenar instalaciones por servivcio
  $("#inst_servicio").change(function(event) {
    var inst_tipo_id1=0;
    $.get("/tipoinstalaciones/"+event.target.value+"", function(response,state){
        inst_tipo_id1=response[0].id;
        
        $.get("/listarinstalaciones/"+inst_tipo_id1+"", function(response,state){
          $("#divlistarInstalaciones").empty().html(response);        
        });
        
        $("#inst_tipo").empty();
        for (i = 0; i < response.length; i++) {
          $("#inst_tipo").append("<option value='" + response[i].id+ "'>" + response[i].nombre + "</option>")
        }
      });    
  });
//---------------------------------------------------------- llenar tipo de instalaciones
   $("#inst_tipo").change(function(event) {
    $.get("/listarinstalaciones/"+event.target.value+"", function(response,state){
        $("#divlistarInstalaciones").empty().html(response);        
      });
  });

  //----------------------------------- guardar Instalaciones
  $("#guardarInstalacion").click(function(event) {
    var token=$("input[name=_token]").val();
    var nombre1=$("#instNombre").val();
    var cupo1=$("#instCupo").val();
    var inst_tipo_id1=$("#inst_tipo").val();

    $.ajax({
      url: '/instalacionCrear',
      headers:{'X-CSRF-TOKEN':token},      
      type: 'POST',
      dataType: 'json',
      data: {nombre: nombre1, cupo:cupo1, inst_tipo_id:inst_tipo_id1},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });

     $.get("/listarinstalaciones/"+inst_tipo_id1+"", function(response,state){
        $("#divlistarInstalaciones").empty().html(response);        
      });
  });

//--------------------------------------Borrar Antecedente----------------------------
  $(".borrarAntecedente").click(function(event) {
      var antecedenteId = $('input[type=hidden]', $(this).closest("tr")).val();
      var token=$("input[name=_token]").val();

      console.log(antecedenteId);

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

  //-----------------------------------Antecentes ---------------------------------------
  $(".antecedentesClase").click(function(event) {
    var antecedenteclase_id = $('input[type=hidden]', $(this).closest("tr")).val();
    $('#claseId').val(antecedenteclase_id);
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
  //-----------------------------------------Borrar etapashc
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

  //-------------------------------editar etapas hc
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
  //----------------------- actualizar etapas hc
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
  //---------------------------------------Autocomplete para etapas hc
  $(function()
    {
       $("#txtetapahc").autocomplete({
        source: "/buscar/etapashc",
        minLength: 1,
        select: function(event, ui) {
          $('#txtetapahc').val(ui.item.value);
          $('#hdnidetapashc').val(ui.item.id);
        }
      });
        $("#txtetapahc").click(function(){
        $("#txtetapahc").val("");
        $('#hdnidetapashc').val("0");

      });
    });

  
  //---------------------------------------------- Agregar etapas HcEspecialidad
  $('#guardarEtapaHcServicio').click(function(event) {
    var _etapashc_id=$('#hdnidetapashc').val();
    var _cupsespecialidad_id=$('#CmbCupsEspecialidad').val();
    var token=$("input[name=_token]").val();
    var route='/etapashcespecialidadCrear';
    console.log(_etapashc_id);
    console.log(_cupsespecialidad_id);
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {etapashc_id: _etapashc_id, cupsespecialidad_id: _cupsespecialidad_id},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
     $.get("/listaretapashcespecialidad/"+_cupsespecialidad_id+"", function(response,state){
          $("#DivListarEtapashcEspecialidad").empty().html(response);        
      });
  });
  $("#CmbCupsEspecialidad").change(function(event){
      $("#DivListaritemshc").empty();
      $.get("/listaretapashcespecialidad/"+event.target.value+"", function(response,state){
          $("#DivListarEtapashcEspecialidad").empty().html(response);
      });
    });
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

  //---------------------------------------------- Agregar Items Hc
  $('#agregarItemHc').click(function(event) {
    var _nombre=$('#itemNombre').val();
    var _etapashcespecialidad_id=$('#hdnidetapashcespecialidad').val();
    var _sugerencia=$('#itemSugerencia').val();
    var _type=$('#itemtype').val();
    var token=$("input[name=_token]").val();
    var route='/itemshcCrear';
    $.ajax({
      url: route,
      headers:{'X-CSRF-TOKEN':token},
      type: 'post',
      dataType: 'json',
      data: {nombre: _nombre, etapashcespecialidad_id: _etapashcespecialidad_id, sugerencia:_sugerencia, type: _type},
      success:function(data){
        if (data.success='true'){
            
        }
      },
      error:function(data){
        console.log('Error')
      }
    });
     $.get("/listaritemshc/"+_etapashcespecialidad_id+"", function(response,state){
          $("#DivListaritemshc").empty().html(response);        
      });
  });

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
  //---------------------------Mosrar itemhc-------------------------------------------
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
//-----------------------------Actualizar Itemhc---------------------------------------------
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
});