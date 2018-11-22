@extends('layouts.main')

@section('title', 'Listado de Usuarios')

@section('main.title','Listado de Usuarios')

@section('main')

	<div class="list-container">

	@if (count($list))
		@foreach($list as $item)
		<div class="card"> 
			<div class="card-body card-record row align-items-center">
				<div class="col-sm-4">
					<a class="title" href="{{ route('user.formEdit', [ 'id' => $item->id ])}}">{{ $item->name }}</a>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-2 text-right">
					<div class="options">
						<a href="{{ route('user.formEdit', [ 'id' => $item->id ])}}">Editar</a>
						{{ Html::methodLink("DELETE", route('user.delete', $item->id), 'Eliminar') }}
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
	<div class="card">
		<div class="card-body">
			<h2>No se encontraron usuarios.</h2>
		</div>
	</div>
	@endif

	</div>

	<a class="btn btn-primary" href="{{ route('register') }}">Agregar nuevo</a>

@endsection