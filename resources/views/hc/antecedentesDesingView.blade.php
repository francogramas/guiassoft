@extends('layouts.dashboardAdmin')
@section('page_heading','Administración de antecedentes')
@section('section')

{{ csrf_field() }}

<div class="row">
	<div class="col-sm-3">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>
						<h4>Clase de antecedentes</h4>
					</td>
				</tr>	
			</thead>
			<tbody>
			@foreach ($clases as $clase)
				<tr>
					<td>
						<input type="hidden" id={{'HdnClase'.$clase->id }} value={{ $clase->id }}>
						<a href="#" class="antecedentesClase">{{ $clase->nombre }}</a>
					</td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div>
	<div class="col-sm-9">
		<input type="hidden" id="claseId" value="">
		<div id="admAntecedentes">
		
		</div>
	</div>	
</div>
@stop