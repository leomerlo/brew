<div class="form-group">

	<label for="{{ $field['name'] }}">{{ $field['label'] }}: </label>
	{{ Form::select($field['name'], json_decode($field['options']), old($field['name'],$field['value']), ['class' => 'form-control render-'.$field['field_type']['type'].' render-'.$field['name']] ) }}
</div>