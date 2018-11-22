@extends('layouts.main')

@section('title', 'Editar Tipo de Registro')

@section('main.title', 'Editar '.$recordType->type)

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
@endsection

@section('main')

	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route('recordType.editStore', ['id' => $recordType->id]) }}">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="type">Tipo:</label>
					<input class="form-control" type="text" name="type" id="type" value="{{ old($recordType->type, $recordType->type) }}" />
					@if($errors->has('type'))
					<div class="alert alert-danger">{{ $errors->first('type') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="slug">Slug:</label>
					<input class="form-control" type="text" name="slug" id="slug" value="{{ old($recordType->slug, $recordType->slug) }}" />
					@if($errors->has('slug'))
					<div class="alert alert-danger">{{ $errors->first('slug') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label class="small" for="title">Mostrar en el menu:</label>
					<input type="checkbox" class="form-control" name="show_on_menu" id="show_on_menu" value="1" {{ $recordType->show_on_menu ? 'checked' : null }} />
					@if($errors->has('show_on_menu'))
					<div class="alert alert-danger">{{ $errors->first('show_on_menu') }}</div>
					@endif
				</div>

				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Editar</button>
					</div>
					<a class="link link-back" href="{{ route('recordType.index') }}">Volver</a>
				</div>

			</form>
		</div>
		<div class="col-lg-3">
			<h2 class="subtitle">Fields asociados</h2>

			<ul class="list-group list-group-flush">
				@foreach($recordType->fields as $field)
			  	<li class="list-group-item"><a href="{{ route('fields.formEdit', ['id' => $field->id]) }}"><i class="fas fa-pen"></i></a> {{ $field->label }}</li>
			  @endforeach
			</ul>

		</div>
	</div>

@endsection