@extends('layouts.main')

@section('title', 'Agregar nuevo '.$record_type->type)

@section('main.title', 'Agregar nuevo '.$record_type->type)

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">
			{{ Form::open(array('route' => array('record.store', $record_type->slug), 'files' => true ))  }}
				
				@csrf

				<div class="form-group">
					<label for="title">Titulo:</label>
					<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
					@if($errors->has('title'))
					<div class="alert alert-danger">{{ $errors->first('title') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label class="small" for="title">Slug:</label>
					<input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" />
					@if($errors->has('slug'))
					<div class="alert alert-danger">{{ $errors->first('slug') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label class="small" for="title">Mostrar en el menu:</label>
					<input type="checkbox" class="form-control" name="show_on_menu" id="show_on_menu" />
					@if($errors->has('show_on_menu'))
					<div class="alert alert-danger">{{ $errors->first('show_on_menu') }}</div>
					@endif
				</div>

				@foreach($record_type->fields as $field)

					@include('renders.'.$field->fieldType->type, ['field', $field])

				@endforeach

				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Crear</button>
					</div>
					<a class="link link-back" href="{{ route('record.index', ['slug' => $record_type->slug]) }}">Volver</a>
				</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection