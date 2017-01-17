@extends('layouts.dashboardAdmin')
@section('page_heading','Administración de etapas de historias clínicas')
@section('section')

{{ csrf_field() }}
<style>
  .modal-header, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
    }
  .modal-footer {
      background-color: #f9f9f9;
    }
  </style>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-info">
		  <div class="panel-heading">Etapas de Historia clínicas</div>
		  <div class="panel-body">
		  <div class="row">
		  	<div class="col-sm-10">
		  		<label for="txtEtapa">Nueva Etapa</label>
				<input type="text" class="form-control" id="txtEtapa">
		  	</div>
		  	<div class="col-sm-2">
				<label for=""><br></label>
				<button type="button" id="guardarEtapaHc" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar etapa de historia clínica"><i class="fa fa-plus"></i></button>
		  	</div>
		  </div>
			<div>
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
							<td>{{ $etapashci->nombre }}</td>
							<td>
								<a href="#" id="borrarEtapa" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-times"></i></a>
								<a href="#" id="editarEtapa" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		  </div>
		</div>
	</div>

	<div class="col-sm-3">
		<div class="panel panel-info">
			<div class="panel-heading">Construccion de la historia clínica por servicio</div>
			<div class="panel-body">
				<ul class="list-inline">
					<div class="form-group">
				 		<label for="servicio">Ámbito</label>
				 		<select class="form-control" name="cmbAmbito" id="cmbAmbito">
							@foreach ($ambitoprocedimiento as $ambitoi)
								<option value={{ $ambitoi->id }}> {{ $ambitoi->descripcion }} </option>
							@endforeach
						</select>
					</div>
				 	<div class="form-group">
				 		<label for="servicio">Tipo de Servicio</label>
						<select class="form-control" name="cmbServicios" id="cmbServicios">
							@foreach ($servicios as $servicio)
								<option value={{ $servicio->id }}> {{ $servicio->nombre }} </option>
							@endforeach
						</select>
				 	</div>
				 	<div class="form-group">
				 		<label for="especialidad">Especialidad</label>
						<select class="form-control"  id="cmbEspecialidadServicio" name="cmbEspecialidadServicio">
							@foreach ($especialidad as $especialidadi)
								<option value={{ $especialidadi->id }}> {{ $especialidadi->nombre }} </option>
							@endforeach
						</select>
				 	</div>
				 	<div class="form-group">
				 		<label for="CmbCupsEspecialidad">Cups</label>
						<select class="form-control"  id="CmbCupsEspecialidad">
							@foreach ($cupsespecialidad as $cupsespecailidadi)
								<option value={{ $cupsespecailidadi->id }}> {{ $cupsespecailidadi->nombre }} </option>
							@endforeach
						</select>
				 	</div>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading">Detalle de cada etapa</div>
			<div class="panel-body">
				<div>
					<div class="row">
						<div class="col-sm-4">
							<label for="itemNombre">Nuevo Item</label>
							<input type="text" id="itemNombre" class="form-control" placeholder="Agregar item">
						</div>
						<div class="col-sm-4">
							<label for="sitemSugerencia">Sugerencia</label>
					  		<input type="text" id="itemSugerencia" class="form-control" placeholder="Sugerencia">
						</div>
						<div class="col-sm-3">
							<label for="itemType">Tipo de dato</label>
							<select id="itemtype" class="form-control">
						  		<option value="text">Texto</option>
								<option value="number">Numérico</option>
					  			<option value="date">Fecha</option>
					  			<option value="email">Correo</option>
					  		</select>
						</div>
						<div class="col-sm-1">
							<label for=""><br></label>
							<a href="#" id="agregarItem" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Agregar item"><i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
  <!-- Modal -->

  <div class="modal fade" id="myModalEsp" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Etapas</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" style="width: 100%">
            <div class="row">
              <div class="col-sm-9">
                <input type="text" id="txtEspecialidad" class="form-control" style="width: 100%">
              </div>
              <div class="col-sm-3">
                <button type="button" id="btnActualizarEtapa" class="btn btn-success" data-dismiss="modal"><i class="fa fa- fa-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
@stop