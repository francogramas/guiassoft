@extends('layouts.dashboardAdmin')
@section('page_heading','Administrar contratos')
@section('section')
	<div>
		<table   class="table table-striped" style="font-size: 10pt;">
			<thead>
				<tr>
					<td>Número</td>
					<td>Nombre</td>
					<td>Plan</td>
					<td>Seguro Médico</td>
					<td>Tipo</td>
					<td>Estado</td>
					<td>Monto</td>
					<td>Inicia</td>
					<td>Finaliza</td>
					<td>Editar</td>
				</tr>
			</thead>
			<tdody>
			 @foreach ($contratos as $contrato)
			 	<tr>
					<td>{!! $contrato->numero !!}</td>
					<td>{!! $contrato->nombre !!}</td>
					<td>{!! $contrato->plan !!}</td>
					<td>{!! $contrato->seguromedico !!}</td>
					<td>{!! $contrato->tipocontrato !!}</td>
					<td>{!! $contrato->estadocontrato !!}</td>					
					<td>{!! $contrato->monto !!}</td>
					<td>{!! $contrato->inicio !!}</td>
					<td>{!! $contrato->final !!}</td>
					<td><a href="{{ route('contratos.edit',$contrato->id) }}">Editar</a> </td>
				</tr>
			 @endforeach				
			</tdody>
		</table>
	</div>
@stop