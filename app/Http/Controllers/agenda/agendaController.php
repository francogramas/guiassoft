<?php

namespace guiassoft\Http\Controllers\agenda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use guiassoft\Http\Requests;
use guiassoft\Http\Controllers\Controller;
use guiassoft\Model\servicios\servicios;
use guiassoft\Model\servicios\especialidad;
use guiassoft\Model\servicios\especialidadempleados;
use guiassoft\Model\empresa\seguromedico;
use guiassoft\Model\pacientes\tipousuario;
use guiassoft\Model\empresa\empleados;
use guiassoft\Model\instalaciones\instalacion_empleado;
use guiassoft\Model\instalaciones\instalacion;
use guiassoft\Model\contratacion\contratos;
use guiassoft\Model\agenda\agenda;
use guiassoft\Model\agenda\agendaestado;
use guiassoft\Model\pacientes\pacientes;



class agendaController extends Controller
{
    public function index(){

    	$seguromedico=seguromedico::all();
        $contratos=contratos::all();
    	$servicios=servicios::where('ambitoprocedimiento_id',1)->get();
        $especialidad=especialidad::select('id','nombre')->where('servicios_id',$servicios[0]{"id"})->get();            
        $especialidadempleados=especialidadempleados::select('empleados.id','empleados.nombre','empleados.apellido1','empleados.apellido2')
        ->join('empleados','especialidadempleados.empleados_id','=','empleados.id')
        ->where('especialidadempleados.especialidad_id',$especialidad[0]{"id"})
        ->get();
    	$tipousuario=tipousuario::all();
    	return view('agenda.agendaView')
        ->with('servicios',$servicios)
    	->with('contratos',$contratos)
    	->with('especialidad',$especialidad)
        ->with('tipousuario',$tipousuario)
    	->with('especialidadempleados',$especialidadempleados)
    	->with('seguromedico',$seguromedico);
    }

    public function cambiarEstadoCita(Request $request, $estado, $cita){
        $agenda=DB::select('call cambiar_estado_cita(?,?);', [$estado, $cita]);            
    }

     public function listarAgenda($empleados_id, $fecha){
            $agenda=DB::select('call llenar_agenda_empleado(?,?)', [$empleados_id, $fecha]);
            return view('agenda.agendaTablaView')
            ->with('agenda',$agenda);
    }

   public function store(Request $request){
        if ($request->ajax()){
             $request{'users_id'}=Auth::id();
            
            $instalacion=instalacion::select('cupo')
            ->where('id',$request->instalacion_id)
            ->first();
            
            $agendaCita=agenda::where('fecha',$request->fecha)
            ->where('hora',$request->hora)
            ->where('empleados_id',$request->empleados_id)  
            ->where('agendaestado_id','<>',4)
            ->where('agendaestado_id','<>',5)            
            ->count();
            
            if ($agendaCita < $instalacion->cupo){
                $result = agenda::create($request->all());
                $agenda=DB::select('update agenda set agendaestado_id=3 where agendaestado_id like 1 and fecha=current_date and hora<=current_time;'); 
            }
            else{
                $result=false;
            }
            

            if($result){
                return response()->json(['succes'=>'true']);
            }
            else{
                return response()->json(['succes'=>'false']);
            }
        }        
    }

    public function mostrarCita($fecha, $empleados_id){
        $cita=agenda::select('agenda.id','horareferencia.id as horareferencia_id','agenda.hora','pacientes.nombre1','pacientes.nombre2','pacientes.apellido1','pacientes.apellido2','pacientes.nacimiento','seguromedico.razonsocial','agendaestado.nombre as estado','contratos.nombre as contrato')
        ->join('pacientes','agenda.pacientes_id','=','pacientes.id')
        ->join('seguromedico','agenda.seguromedico_id','=','seguromedico.id')
        ->join('agendaestado','agenda.agendaestado_id','=','agendaestado.id')
        ->join('contratos','agenda.contratos_id','=','contratos.id')
        ->join('horareferencia','agenda.hora','=','horareferencia.hora')
        ->where('agenda.fecha',$fecha)        
        ->where('agenda.empleados_id',$empleados_id)
        ->where('agenda.agendaestado_id','<>','4')
        ->get();

        return response()->json($cita);
    }

    public function mostrarListaCitasPacientes($pacientes_id){
        $citas=agenda::select('agenda.fecha','especialidad.nombre as especialidad')
        ->join('especialidad','agenda.especialidad_id','=','especialidad.id')
        ->where('agenda.pacientes_id',$pacientes_id)
        ->where('agenda.agendaestado_id',7)
        ->orderBy('fecha','desc')
        ->paginate(20);

        return view('agenda.citasListaView')
        ->with('citas',$citas);
    }
}