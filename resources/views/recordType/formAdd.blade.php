@extends('layouts.main')

@section('title', 'Agregar nuevo tipo de Registro')

@section('main.title', 'Agregar nuevo tipo de Registro')

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">

			<form method="POST" action="{{ route('recordType.store') }}">
				
				@csrf

				<div class="form-group">
					<label for="type">Tipo:</label>
					<input class="form-control" type="text" name="type" id="type" />
					@if($errors->has('type'))
					<div class="alert alert-danger">{{ $errors->first('type') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="slug">Slug:</label>
					<input class="form-control" type="text" name="slug" id="slug" />
					@if($errors->has('slug'))
					<div class="alert alert-danger">{{ $errors->first('slug') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label class="small" for="title">Mostrar en el menu:</label>
					<input type="checkbox" class="form-control" name="show_on_menu" id="show_on_menu" value="1" />
					@if($errors->has('show_on_menu'))
					<div class="alert alert-danger">{{ $errors->first('show_on_menu') }}</div>
					@endif
				</div>

				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Crear</button>
					</div>
					<a class="link link-back" href="{{ route('recordType.index') }}">Volver</a>
				</div>

			</form>
		</div>
	</div>

@endsection