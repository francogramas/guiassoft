@extends('layouts.dashboardAdmin')
@section('page_heading','Ingreso Seguros médicos')
@section('section')
{!! Form::model($segurosmedicos, ['route' => ['segurosmedicos.update',$segurosmedicos->id],'method'=>'PUT']) !!}

{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="tipo">Tipo</label>
			{!! Form::text('tipo',$segurosmedicos{'tipo'},['id'=>'tipo','class'=>'form-control','required'=>'required','placeholder'=>'Tipo']) !!}			
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="codigo">Código</label>
			{!! Form::text('codigo',$segurosmedicos{'codigo'},['id'=>'codigo','class'=>'form-control','required'=>'required','placeholder'=>'Código']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="nit">Nit</label>
			{!! Form::text('nit',$segurosmedicos{'nit'},['id'=>'nit','class'=>'form-control','required'=>'required','placeholder'=>'Nit']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="razonsocial">Razón social</label>			
			{!! Form::text('razonsocial',$segurosmedicos{'razonsocial'},['id'=>'razonsocial','class'=>'form-control','required'=>'required','placeholder'=>'Razón social']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for="pais">País</label>
			{!! Form::select('paises', $pais1,$segurosmedicos{'pais_id'}, ['id' => 'paises','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="estado">Departamento/estado</label>
			{!! Form::select('departamentos', $estados,$segurosmedicos{'estado_id'}, ['id' => 'departamentos','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="ciudad">Ciudad</label>
			{!! Form::select('ciudad_id', $ciudades,$segurosmedicos{'ciudad_id'}, ['id' => 'ciudad_id','class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			{!! Form::text('telefono',$segurosmedicos{'telefono'},['id'=>'telefono','class'=>'form-control','required'=>'required','placeholder'=>'Teléfono']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-8">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			{!! Form::text('direccion',$segurosmedicos{'direccion'},['id'=>'direccion','class'=>'form-control','required'=>'required','placeholder'=>'Dirección']) !!}
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