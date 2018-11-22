<div class="form-group render-{{$field['field_type']['type']}}">
	<label for="{{ $field['name'] }}">{{ $field['label'] }}: </label>

	{{ Form::file($field['name'], $attributes = array('class' => 'form-control-file', 'value' => old($field['name'],$field['value']))) }}

	<img src="<?= url('imgs/'.$field['value']); ?>" alt="">

</div>