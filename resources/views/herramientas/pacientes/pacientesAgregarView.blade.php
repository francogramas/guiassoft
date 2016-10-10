{!! Form::open(['route' => 'pacientes.store','method'=>'POST']) !!}
{{ csrf_field() }}

<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipodocumentopaci_id">Tipo de documento</label>
				{!! Form::select('tipodocumentopaci_id', $tipodocumentopaci,null, ['id' => 'tipodocumentopaci_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="">Número de documento</label>
				{!! Form::text('documento',null,['id'=>'documento','required'=>'required','class'=>'form-control','placeholder'=>'Número de documento']) !!}		
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipousuario_id">Tipo de usuario</label>
			{!! Form::select('tipousuario_id', $tipousuario,null, ['id' => 'ttipousuario_id','class'=>'form-control']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido1">Primer apellido</label>
			{!! Form::text('apellido1',null,['id'=>'apellido1','required'=>'required','class'=>'form-control','placeholder'=>'Primer apellido']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="apellido2">Segundo apellido</label>
			{!! Form::text('apellido2',null,['id'=>'apellido2','required'=>'required','class'=>'form-control','placeholder'=>'Segundo apellido']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre1">Primer nombre</label>
			{!! Form::text('nombre1',null,['id'=>'nombre1','required'=>'required','class'=>'form-control','placeholder'=>'Primer nombre']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nombre2">Segundo nombre</label>
			{!! Form::text('nombre2',null,['id'=>'nombre2','class'=>'form-control','placeholder'=>'Segundo nombre']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="cacimiento">Fecha de nacimiento</label>
			{!! Form::date('nacimiento',null,['id'=>'nacimiento','class'=>'form-control','placeholder'=>'Fecha de nacimiento']) !!}
		</div>
	</div>
</div>
<div class="row">	
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
</div>
<div class="row">
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
	<div class="col-sm-3">
		<div class="form-group">
			<label for="zonaresidencia_id">Zona de residencia</label>			
    		{!! Form::select('zonaresidencia_id', $zonaresidencia,null,['id'=>'zonaresidencia_id','class'=>'form-control']) !!}			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-8">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','required'=>'required','placeholder'=>'Dirección']) !!}
		</div>		
	</div>
	<div class="col-sm-3">
		<div class="form-group">		
			<button type="submit" class="btn btn-primary" > {{ $texto }}  </button>
		</div>
	</div>
</div>
{!! Form::close()!!}