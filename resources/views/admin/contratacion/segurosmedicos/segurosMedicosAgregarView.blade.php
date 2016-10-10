@extends('layouts.dashboardAdmin')
@section('page_heading','Ingreso de pacientes')
@section('section')
{!! Form::open(['route' => 'segurosmedicos.store','method'=>'POST']) !!}
{{ csrf_field() }}
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<label for=""></label>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop