@extends('layouts.main')

@section('title', 'Editando registro '.$record->title)

@section('main.title', 'Editando registro '.$record->title)

@section('scripts')
<script src="<?= url('js/forms.js') ?>"></script>
@endsection

@section('main')

	<a class="link link-vista-previa" target="_blank" href="{{ route('record.view', ['slug' => $record->slug]) }}">Vista previa</a>

	<div class="row">
		<div class="col-md-6">
			{{ Form::open(array('route' => array('record.editStore', $record->id), 'files' => true ))  }}
				
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="title">Titulo:</label>
					<input type="text" class="form-control" name="title" id="title" value="{{ old('title', $record->title) }}" />
					@if($errors->has('title'))
					<div class="alert alert-danger">{{ $errors->first('title') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="slug">Slug:</label>
					<input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $record->slug) }}" />
					@if($errors->has('slug'))
					<div class="alert alert-danger">{{ $errors->first('slug') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label class="small" for="title">Mostrar en el menu:</label>
					<input type="checkbox" class="form-control" name="show_on_menu" id="show_on_menu" value="1" {{ $record['show_on_menu'] ? 'checked' : null }} />
					@if($errors->has('show_on_menu'))
					<div class="alert alert-danger">{{ $errors->first('show_on_menu') }}</div>
					@endif
				</div>

				@foreach($fields as $field)

				@includeFirst([
					'renders.'.$field['field_type']['type'],
					'renders.input'
				], ['field' => $field ])
				@endforeach

				<div class="option-container">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
					</div>
					<a class="link link-back" href="{{ route('record.index', ['slug' => $record->slug]) }}">Volver</a>
				</div>

			{{ Form::close() }}
		</div>
		@if(count($comments) > 0)
		<div class="col-md-5 offset-md-1">
			<span>Comentarios:</span>

			@foreach($comments as $comment)
				<div class="card">
				  <div class="card-body">
				  	<span class="card-user">{{$comment->user->name}} dijo:</span>
				    <p class="card-text">{{$comment->body}}</p>
				    <div class="options">
				    	{{ Html::methodLink("DELETE", route('comment.delete', $comment->id), "Eliminar") }}
					  </div>
				  </div>
				</div>
			@endforeach

		</div>
		@endif
	</div>

@endsection