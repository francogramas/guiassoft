@extends('layouts.dashboardAdmin')
@section('page_heading','Agregar empleados')
@section('section')

{!! Form::model($empleados, ['route' => ['empleados.update',$empleados->id],'method'=>'PUT']) !!}

{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">T. Documento</label>
				{!! Form::select('tipodocumentopaci_id', $tipodocumentopaci,$empleados{'tipodocumentopaci_id'}, ['id' => 'tipodocumentopaci_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="documento">Documento</label>
				{!! Form::text('documento',$empleados{'documento'},['id'=>'documento','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre">Nombres</label>
				{!! Form::text('nombre',$empleados{'nombre'},['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido1">Primer apellido</label>
				{!! Form::text('apellido1',$empleados{'apellido1'},['id'=>'apellido1','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido2">Segundo apellido</label>
				{!! Form::text('apellido2',$empleados{'apellido1'},['id'=>'apellido2','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nacimiento">Fecha de nacimiento</label>
			{!! Form::date('nacimiento',$empleados{'nacimiento'},['id'=>'nacimiento','class'=>'form-control','placeholder'=>'Fecha de nacimiento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="sexo_id">Sexo</label>
			{!! Form::select('sexo_id', $sexo,$empleados{'sexo_id'}, ['id' => 'sexo_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="pais">País</label>
			{!! Form::select('paises', $pais1,$empleados{'pais_id'}, ['id' => 'paises','class'=>'form-control']) !!}
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estado">Departamento/estado</label>
    		{!! Form::select('departamentos',$estados,$empleados{'estados_id'},['id'=>'departamentos','class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="form-group">
			<label for="ciudad">Ciudad</label>
    		{!! Form::select('ciudad_id',$ciudades,$empleados{'ciudad_id'},['id'=>'ciudad_id','class'=>'form-control']) !!}    			    		
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			{!! Form::text('telefono',$empleados{'telefono'},['id'=>'telefono','class'=>'form-control','required'=>'required','placeholder'=>'Teléfono']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="correo">Correo electrónico</label>
			{!! Form::email('correo',$empleados{'correo'},['id'=>'correo','class'=>'form-control','placeholder'=>'Correo Electrónico']) !!}
		</div>
	</div>		
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estadoempleados_id">Estado del Empleado</label>
				{!! Form::select('estadoempleados_id', $estadoempleados,$empleados{'estadoempleados_id'}, ['id' => 'estadoempleados_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="role_id">Rol de usuario</label>
				{!! Form::select('role_id', $role,$empleados{'role_id'}, ['id' => 'role_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="">Dirección</label>
			{!! Form::text('direccion',$empleados{'direccion'},['id'=>'direccion','class'=>'form-control','required'=>'required','placeholder'=>'Dirección']) !!}
		</div>
	</div>
	<div class="col-sm-1">
		<div class="form-group">
			<br>
			<button type="submit" class="btn btn-primary" > Actualizar </button>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop