<?php
/** @var App\Models\Record $record */
?>

@extends('layouts.main')

@section('title', "Ver Record")

@section('main')
	<?php
	/*
	Blade permite imprimir datos utilizando {{ $dato }}.
	Esos datos son automáticamente filtrados para evitar inyección HTML.
	*/
	?>
	<h1>{{ $record->titulo }}</h1>

	@if(!empty($record->imagen))
	<div class="imagen">
		<img src="{{ url('imgs/' . $record->imagen) }}" alt="{{ $record->titulo }}">
	</div>
	@endif

	<dl>
		<dt>Fecha de estreno</dt>
		<dd>{{ $record->fecha_estreno->format('d-m-Y') }}</dd>
		<dt>Director</dt>
		<dd>{{ $record->director->nombreCompleto }}</dd>
		<dt>Sinopsis</dt>
		<dd>{{ $record->sinopsis }}</dd>
	</dl>
@endsection