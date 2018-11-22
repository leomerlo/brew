@extends('layouts.main')

@section('title', 'Agregar nuevo field')

@section('main.title', 'Agregar nuevo field')

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
<script src="<?= url('js/fields.form.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">

			<form method="POST" action="{{ route('fields.store') }}">
				
				@csrf

				<div class="form-group">
					<label for="label">Label:</label>
					<input class="form-control" type="text" name="label" id="label" />
					@if($errors->has('label'))
					<div class="alert alert-danger">{{ $errors->first('label') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="name">Nombre:</label>
					<input class="form-control" type="text" name="name" id="name" />
					@if($errors->has('name'))
					<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="type">Tipo:</label>
					{{ Form::select('type', $field_types, old('type'), ['class' => 'form-control']) }}
					@if($errors->has('type'))
					<div class="alert alert-danger">{{ $errors->first('type') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="options">Opciones:</label>
					<span class="hint">Formato: "valor:Label"</span>
					<textarea  class="form-control" name="options" id="options"></textarea>
					@if($errors->has('options'))
					<div class="alert alert-danger">{{ $errors->first('options') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label>Visible en:</label>
					<div class="row">
						<div class="col-6">
							<span>Tipos de record</span>
							{{ Form::select('record_types[]', $record_types, old('record_types'), ['multiple', 'class' => 'form-control'] ) }}
						</div>
						<div class="col-6">
							<span>Record</span>
							{{ Form::select('record_ids[]', $records, old('record_ids'), ['multiple', 'class' => 'form-control'] ) }}
						</div>
					</div>
					@if($errors->has('record_types'))
					<div class="alert alert-danger">{{ $errors->first('record_types') }}</div>
					@endif

					@if($errors->has('record_ids'))
					<div class="alert alert-danger">{{ $errors->first('record_ids') }}</div>
					@endif
				</div>

				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Crear</button>
					</div>
					<a class="link link-back" href="{{ route('fields.index') }}">Volver</a>
				</div>

			</form>
		</div>
	</div>

@endsection