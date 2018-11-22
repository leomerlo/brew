@extends('layouts.main')

@section('title', 'Listado de Campos')

@section('scripts')
<script src="<?= url("js/fields.listing.js");?>"></script>
@endsection

@section('main.title','Listado de Campos')

@section('main')

	<div class="filter-container">
		
		<div class="row mb-2">
			<div class="col-12">
				<h2>Filtro
				@if(isset($filter))
					: <span>{{ $filter->name }}</span> <a href="{{ route('fields.index') }}"> Limpiar filtro</a>
				@endif
			</h2>
			</div>
		</div>
		<form id="filter" action="{{ route('fields.indexFilter') }}" method="POST">
			@csrf
			@method('POST')
			<div class="row">
				<div class="col-md-2">
					<select class="w-100" name="recordType" id="recordType">
						<option value="">Seleccioná un Tipo</option>
						@foreach($recordTypes as $type)
							<option value="{{$type->id}}">{{$type->type}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<select class="w-100" name="recordId" id="recordId">
						<option value="">Seleccioná un Record</option>
						@foreach($recordIds as $record)
							<option value="{{$record->id}}">{{$record->title}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</form>

	</div>

	<div class="list-container">

	@if (count($list))
		@foreach($list as $item)
		<div class="card">
			<div class="card-body card-record row align-items-center">
				<div class="col-sm-4">
					<a class="title" href="{{ route('fields.formEdit', [ 'id' => $item->id ])}}">{{ $item->label }}</a>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2 text-right">
					<div class="options">
						<a href="{{ route('fields.formEdit', [ 'id' => $item->id ])}}">Editar</a>
						{{ Html::methodLink("DELETE", route('record.delete', $item->id), 'Eliminar') }}
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="card">
		<div class="card-body">
			<h2>No se encontraron campos</h2>
		</div>
	</div>
	@endif

	</div>

	<a class="btn btn-primary" href="{{ route('fields.formAdd') }}">Agregar nuevo</a>

@endsection