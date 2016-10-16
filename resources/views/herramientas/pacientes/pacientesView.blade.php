@extends('layouts.dashboardAdmin')
@section('page_heading','Datos de la empresa')
@section('section')
{!! Form::model($paciente, ['route' => ['pacientes.update',$paciente->id],'method'=>'PUT']) !!}

{{ csrf_field() }}

<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipodocumentopaci_id">Tipo de documento</label>
				{!! Form::select('tipodocumentopaci_id',$tipodocumentopaci,$paciente{'tipodocumentopaci_id'}, ['id' => 'tipodocumentopaci_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Número de documento</label>
				{!! Form::text('documento',$paciente{'documento'},['id'=>'documento','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}		
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipousuario_id">Tipo de usuario</label>
			{!! Form::select('tipousuario_id', $tipousuario,$paciente{'tipousuario_id'}, ['id' => 'tipousuario_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="seguromedico_id">Seguro médico</label>
				{!! Form::select('seguromedico_id', $seguromedico,$paciente{'seguromedico_id'}, ['id' => 'seguromedico_id','class'=>'form-control']) !!}			
		</div>
	</div>	
</div>
<div class="row">	
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido1">Primer apellido</label>
			{!! Form::text('apellido1',$paciente{'apellido1'},['id'=>'apellido1','required'=>'required','class'=>'form-control','placeholder'=>'Primer apellido']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido2">Segundo apellido</label>
			{!! Form::text('apellido2',$paciente{'apellido2'},['id'=>'apellido2','required'=>'required','class'=>'form-control','placeholder'=>'Segundo apellido']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre1">Primer nombre</label>
			{!! Form::text('nombre1',$paciente{'nombre1'},['id'=>'nombre1','required'=>'required','class'=>'form-control','placeholder'=>'Primer nombre']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre2">Segundo nombre</label>
			{!! Form::text('nombre2',$paciente{'nombre2'},['id'=>'nombre2','class'=>'form-control','placeholder'=>'Segundo nombre']) !!}
		</div>
	</div>	
</div>
<div class="row">	
	<div class="col-sm-3">
		<div class="form-group">
			<label for="cacimiento">Fecha de nacimiento</label>
			{!! Form::date('nacimiento',$paciente{'nacimiento'},['id'=>'nacimiento','class'=>'form-control','placeholder'=>'Fecha de nacimiento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="sexo_id">Sexo</label>
			{!! Form::select('sexo_id', $sexo,$paciente{'sexo_id'}, ['id' => 'sexo_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="pais">País</label>
			{!! Form::select('paises', $pais1,$paciente{'pais_id'}, ['id' => 'paises','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estado">Departamento/estado</label>    		
    		{!! Form::select('departamentos',$estados,$paciente{'estados_id'},['id'=>'departamentos','class'=>'form-control']) !!}
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="ciudad">Ciudad</label>
    		{!! Form::select('ciudad_id', $ciudades,$paciente{'ciudad_id'},['id'=>'ciudad_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			{!! Form::text('telefono',$paciente{'telefono'},['id'=>'telefono','class'=>'form-control','required'=>'required','placeholder'=>'Teléfono']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="correo">Correo electrónico</label>
			{!! Form::text('correo',$paciente{'correo'},['id'=>'correo','class'=>'form-control','placeholder'=>'Correo Electrónico']) !!}
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="form-group">
			<label for="zonaresidencia_id">Zona de residencia</label>			
    		{!! Form::select('zonaresidencia_id', $zonaresidencia,$paciente{'zonaresidencia_id'},['id'=>'zonaresidencia_id','class'=>'form-control']) !!}			
		</div>
	</div>
</div>
<div class="row">	
	<div class="col-sm-6">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			{!! Form::text('direccion',$paciente{'direccion'},['id'=>'direccion','class'=>'form-control','required'=>'required','placeholder'=>'Dirección']) !!}
		</div>		
	</div>
	<div class="col-sm-1">
		<br>
		<button type="submit" class="btn btn-primary" > {{ $texto }}  </button>
	</div>
</div>
{!! Form::close() !!}
@stop