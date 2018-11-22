<div class="comment-form-wrapper">
	{{ Form::open(array('route' => array('comment.add', $id))) }}

		<h3>Dejanos tus comentarios</h3>

		<div class="form-group">
			<label for="slug">Comentario:</label>
			<textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body', '') }}</textarea>
			@if($errors->has('body'))
			<div class="alert alert-danger">{{ $errors->first('body') }}</div>
			@endif
		</div>
		
		<div class="option-container">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Crear</button>
			</div>
		</div>

	{{ Form::close() }}
</div>