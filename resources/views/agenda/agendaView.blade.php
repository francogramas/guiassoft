@extends('layouts.dashboardRecepcion')
@section('page_heading','Agenda')
@section('section')


{{ csrf_field() }}

<div class="row">
	<div class="col-sm-2">
		<!--  Acá va el calendario, el historial y otras herramientas necesarias -->
		<div style="font-size: 70%; vertical-align: mid ">
			<div id="datepicker"></div>
			<input type="hidden" id="fechaAgenda">
		</div>
		<div id="herramientas">
			<div id="pacientesCard"></div>
			<div id="agendaHistorial">
			</div>
		</div>
	</div>
	<div class="col-sm-9 form-group">
		<div class="row">
			<div class="col-sm-6">
				<table>
					<tr>
						<td style="width: 80%">
							<label for="paciente">Paciente</label>
							<input type="hidden" id="idPaciente">
							<input class="form-control" type="search" id="agePaciente" placeholder="Buscar paciente...">
								</td>
						<td style="width: 20%; padding-left: 7px;">
							<label for="Edad">Edad</label>
							<input id="edad" class="form-control" type="text" readonly>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-3">
				<label for="servicio">Tipo de Servicio</label>
				<select class="form-control" name="cmbServicios" id="cmbServicios">
					@foreach ($servicios as $servicio)
						<option value={{ $servicio->id }}> {{ $servicio->nombre }} </option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
				<label for="especialidad">Especialidad</label>
				<select class="form-control"  id="cmbEspecialidadServicio">
					@foreach ($especialidad as $especialidadi)
						<option value={{ $especialidadi->id }}> {{ $especialidadi->nombre }} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<label for="especialista">Especialista</label>
				<select class="form-control" name="especialidadespecialista" id="especialidadespecialista">
					@foreach ($especialidadempleados as $especialidadempleado)
						<option value={{ $especialidadempleado->id }}>{{ $especialidadempleado->nombre.' '.$especialidadempleado->apellido1.' '.$especialidadempleado->apellido2 }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
				<label for="seguroMedico">Seguridad Social</label>
				<select class="form-control" name="seguroMedico" id="seguroMedico">
					@foreach ($seguromedico as $seguromedicoi)
						<option value={{ $seguromedicoi->id }}> {{ $seguromedicoi->razonsocial }} </option>
					@endforeach
				</select>				
			</div>
			<div class="col-sm-3">
				<label for="contrato">Contrato</label>
				<select class="form-control" name="contrato" id="contrato">
					@foreach ($contratos as $contrato)
						<option value={{ $contrato->id }} >{{ $contrato->nombre }}</option>
					@endforeach
				</select>
						
			</div>
			<div class="col-sm-3">
				<label for="tipoSeguridad">Tipo de seguridad</label>
				<select class="form-control" name="tipousuario" id="tipousuario">
					@foreach ($tipousuario as $tipousuarioi)
						<option value={{ $tipousuarioi->id }}>{{ $tipousuarioi->descripcion }} </option>}
						option
					@endforeach
				</select>				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div id="agendaListado">
					
				</div>				
			</div>
		</div>
	</div>	
</div>

@stop