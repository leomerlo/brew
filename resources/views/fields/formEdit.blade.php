@extends('layouts.main')

@section('title', 'Editando Field '.$field->label)

@section('main.title', 'Editando Field "'.$field->label.'"')

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
<script src="<?= url('js/fields.form.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route('fields.editStore', ['id' => $field->id]) }}">
				
				@csrf
				@method('PUT')

				<div class="form-group">
					<label for="label">Label:</label>
					<input class="form-control" type="text" name="label" id="label" value="{{ old($field->label, $field->label) }}" />
					@if($errors->has('label'))
					<div class="alert alert-danger">{{ $errors->first('label') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="name">Nombre:</label>
					<input class="form-control" type="text" name="name" id="name" value="{{ old('name', $field->name) }}" />
					@if($errors->has('name'))
					<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="type">Tipo:</label>
					{{ Form::select('type', $field_types, old('type',$field->type), ['class' => 'form-control']) }}
					@if($errors->has('type'))
					<div class="alert alert-danger">{{ $errors->first('type') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="options">Opciones:</label>
					<span class="hint">Formato: "valor,valor:Label,valor:Label"</span>
					<textarea class="form-control" name="options" id="options">{{ old('options', $field->options) }}</textarea>
					@if($errors->has('options'))
					<div class="alert alert-danger">{{ $errors->first('options') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="options">Visible en:</label>
					<div class="row">
						<div class="col-6">
							<span>Tipos de record</span>
							{{ Form::select('record_types[]', $record_types, old('record_types',$field->recordTypes), ['multiple', 'class' => 'form-control'] ) }}
						</div>
						<div class="col-6">
							<span>Record</span>
							{{ Form::select('record_ids[]', $records, old('record_ids',$field->recordIds), ['multiple', 'class' => 'form-control'] ) }}
						</div>
					</div>
					@if($errors->has('options'))
					<div class="alert alert-danger">{{ $errors->first('record_types') }}</div>
					@endif
				</div>
			
				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
					<a class="link link-back" href="{{ route('fields.index') }}">Volver</a>
				</div>

			</form>
		</div>
	</div>

@endsection