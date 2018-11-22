@extends('layouts.main')

@section('title', 'Listado de '.$slug)

@section('main.title', 'Listado de '.$slug)

@section('main')

	<div class="list-container">

	@if (count($list))
		@foreach($list as $item)
		<div class="card">
			<div class="card-body card-record card-{{$slug}} row align-items-center">
				<div class="col-sm-4">
					<a class="title" href="{{ route('record.formEdit', [ 'id' => $item->id ])}}">{{ $item->title }}</a>
					<span class="date">
						creado
						@if($item->getCreatedDageAgo() > 0)
							hace {{ $item->getCreatedDageAgo() }} horas
						@else
							hoy
						@endif
					</span>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2 text-right">
					<div class="options">
						<a href="{{ route('record.formEdit', [ 'id' => $item->id ])}}">Editar</a>
						{{ Html::methodLink("DELETE", route('record.delete', [ 'id' => $item->id ]), 'Eliminar') }}
						<a href="{{ route('record.view', [ 'type_slug' => $slug, 'slug' => $item->slug ])}}">Ver</a>
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

	<a class="btn btn-primary" href="{{ route('record.formAdd', ['slug' => $slug]) }}">Agregar nuevo</a>

@endsection