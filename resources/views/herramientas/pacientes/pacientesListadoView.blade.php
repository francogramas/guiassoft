{!! Form::open(['route' => 'pacienteslistado.store','method'=>'POST']) !!}
{{ csrf_field() }}
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">			
				{!! Form::text('buscar_id',null,['id'=>'buscar_id','class'=>'form-control','placeholder'=>'Buscar...']) !!}
				{!! Form::hidden('paciente_id',0,['id'=>'paciente_id']) !!}				
		</div>
	</div>
	<div class="col-sm-2">
		<button type="submit" class="btn btn-primary" >Buscar</button>		
	</div>
</div>
<table class="table table-striped">
	<thead class="thead-inverse">
		<tr>
			<td>T. Documento</td>
			<td>Documento Nº</td>
			<td>Nombres y apellidos</td>
			<td>F. Nacimiento</td>
			<td>Sexo</td>
			<td>Departmento</td>
			<td>Ciudad</td>
			<td>Teléfono</td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		@foreach ($pacientes as $paciente)
		<tr>
			<td>{{ $paciente->tipodocumento }}</td>
			<td>{{ $paciente->documento }}</td>
			<td>{{ $paciente->apellido1.' '.$paciente->apellido2.' '.$paciente->nombre1.' '.$paciente->nombre2}}</td>
			<td>{{ $paciente->nacimiento }}</td>
			<td>{{ $paciente->sexo }}</td>
			<td>{{ $paciente->departamento }}</td>
			<td>{{ $paciente->ciudad }}</td>
			<td>{{ $paciente->telefono }}</td>
			<td><a href="{{ route('pacientes.edit',$paciente->id) }}">Editar</a></td>
		</tr>
		@endforeach		
	</tbody>
</table>
{!! Form::close() !!}