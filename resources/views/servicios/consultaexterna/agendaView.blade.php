@extends('layouts.dashboardRecepcion')
@section('page_heading','Agenda')
@section('section')

{{ csrf_field() }}

<div class="row">
	<div class="col-sm-2">
		<!--  Acá va el calendario, el historial y otras herramientas necesarias -->
		<div class="panel panel-info">
			<div class="panel-heading">Fecha de Agenda</div>
			<div class="panel-body">
				<div style="font-size: 75%; vertical-align: mid ">
					<div id="datepickerServicios"></div>
					<input type="hidden" id="fechaAgenda">	
				</div>
			</div>			
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">Herramientas</div>
			<div class="panel-body">
				<div id="pacientesCard"></div>
				<div id="agendaHistorial"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-9 form-group">
		<div class="panel panel-info">
			<div class="panel-heading">Datos del especialista</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3"><label for="">Nombres: </label>
						{{ $user[0]{'name'} }}
						<input type="hidden" id="especialidadespecialista" value={{ $user[0]{'id'} }}>
					</div>
					<div class="col-sm-3"><label for="">Especialidad: </label>
						{{ $user[0]{'role'} }}
					</div>
					<div class="col-sm-4"><label for="">Empresa: </label>
						{{ $empresa{'nombre'} }}
					</div>
				</div>
			</div>
		</div>
			<div id="agendaListadoconsultaexterna"></div>
		</div>
	</div>
	<di class="col-sm-1">
		
	</di>	
</div>

@stop