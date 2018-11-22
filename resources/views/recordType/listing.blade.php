@extends('layouts.main')

@section('title', 'Listado de Record Types')

@section('main.title','Listado de Record Types')

@section('main')

	<div class="list-container">

	@if (count($list))
		@foreach($list as $item)
		<div class="card"> 
			<div class="card-body card-record row align-items-center">
				<div class="col-sm-4">
					<a class="title" href="{{ route('recordType.formEdit', [ 'id' => $item->id ])}}">{{ $item->type }}</a>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2 text-right">
					<div class="options">
						<a href="{{ route('recordType.formEdit', [ 'id' => $item->id ])}}">Editar</a>
						{{ Html::methodLink("DELETE", route('recordType.delete', $item->id), 'Eliminar') }}
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="card">
		<div class="card-body">
			<h2>No se encontraron records del tipo {{ $slug }}</h2>
		</div>
	</div>
	@endif

	</div>

	<a class="btn btn-primary" href="{{ route('recordType.formAdd') }}">Agregar nuevo</a>

@endsection