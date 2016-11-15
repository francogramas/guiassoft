@extends('layouts.dashboardAdmin')
@section('page_heading','Factura de Compra')
@section('section')
{!! Form::open(['route' => 'empresa.store','method'=>'POST']) !!}
{{ csrf_field() }}
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<label for="pais">Tipo de Documento</label>
				{!! Form::select('tipodocumento_id', $tipodocumento,$empresa1{'tipodocumento_id'}, ['id' => 'tipodocumento_id','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				<label for="razonsocial">Razón Social</label>
				{!! Form::text('nombre',$empresa1{'nombre'},['id'=>'nombre','required'=>'required','class'=>'form-control','placeholder'=>'Razón Social']) !!}
			</div>
			<div class="form-group">
				<label for="estado">Departamento/estado</label>
    			{!! Form::select('departamentos',['0'=>'Seleccione el estado/departamento'],null,['id'=>'departamentos','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label>
				{!! Form::text('direccion',$empresa1{'direccion'},['id'=>'direccion','required'=>'required','class'=>'form-control','placeholder'=>'Dirección']) !!}
			</div>
			<div class="form-group">
				<label for="correo">Correo</label>
				{!! Form::email('correo',$empresa1{'correo'},['id'=>'correo','required'=>'required','class'=>'form-control','placeholder'=>'Correo']) !!}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" > {{ $texto }}  </button>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
				<label for="nit">Documento</label>
				{!! Form::text('documento',$empresa1{'documento'},['id'=>'documento','required'=>'required','class'=>'form-control','placeholder'=>'Documento']) !!}
			</div>
			<div class="form-group">
				<label for="pais">País</label>
    			{!! Form::select('paises', $pais1,null, ['id' => 'paises','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
    			{!! Form::select('ciudad_id', ['0'=>'Seleccione la ciudad/municipio'],null,['id'=>'ciudad_id','class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				{!! Form::text('telefono',$empresa1{'telefono'},['id'=>'telefono','required'=>'required','class'=>'form-control','placeholder'=>'Teléfono']) !!}
			</div>
			<div class="form-group">
				<label for="direccion">Código de habilitación</label>
				{!! Form::text('codigo_habilitacion',$empresa1{'codigo_habilitacion'},['id'=>'codigo_habilitacion','required'=>'required','class'=>'form-control','placeholder'=>'Código de habilitación territorial']) !!}
			</div>
		</div>
	</div>
{!! Form::close() !!}
@stop