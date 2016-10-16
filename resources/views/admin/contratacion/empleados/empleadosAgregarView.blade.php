@extends('layouts.dashboardAdmin')
@section('page_heading','Agregar empleados')
@section('section')
{!! Form::open(['route' => 'empleados.store','method'=>'POST']) !!}
{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">T. Documento</label>
				{!! Form::select('tipodocumentopaci_id', $tipodocumentopaci,null, ['id' => 'tipodocumentopaci_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Documento</label>
				{!! Form::text('documento',null,['id'=>'documento','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Nombres</label>
				{!! Form::text('nombre',null,['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Primer apellido</label>
				{!! Form::text('apellido1',null,['id'=>'apellido1','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Segundo apellido</label>
				{!! Form::text('apellido2',null,['id'=>'apellido2','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="cacimiento">Fecha de nacimiento</label>
			{!! Form::date('nacimiento',null,['id'=>'nacimiento','class'=>'form-control','placeholder'=>'Fecha de nacimiento']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="sexo_id">Sexo</label>
			{!! Form::select('sexo_id', $sexo,null, ['id' => 'sexo_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="pais">País</label>
			{!! Form::select('paises', $pais1,null, ['id' => 'paises','class'=>'form-control']) !!}
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estado">Departamento/estado</label>    		
    		{!! Form::select('departamentos',['0'=>'Seleccione el estado/departamento'],null,['id'=>'departamentos','class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="col-sm-3">
		<div class="form-group">
			<label for="ciudad">Ciudad</label>
    		{!! Form::select('ciudad_id', ['0'=>'Seleccione la ciudad/municipio'],null,['id'=>'ciudad_id','class'=>'form-control']) !!}    			    		
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			{!! Form::text('telefono',null,['id'=>'telefono','class'=>'form-control','required'=>'required','placeholder'=>'Teléfono']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="correo">Correo electrónico</label>
			{!! Form::email('correo',null,['id'=>'correo','class'=>'form-control','placeholder'=>'Correo Electrónico']) !!}
		</div>
	</div>		
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estadoempleados_id">Estado del Empleado</label>
				{!! Form::select('estadoempleados_id', $estadoempleados,null, ['id' => 'estadoempleados_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="role_id">Rol de usuario</label>
				{!! Form::select('role_id', $role,null, ['id' => 'role_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label for="">Dirección</label>
			{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','required'=>'required','placeholder'=>'Dirección']) !!}
		</div>
	</div>
	<div class="col-sm-1">
		<div class="form-group">
			<br>
			<button type="submit" class="btn btn-primary" > Agregar </button>	
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop