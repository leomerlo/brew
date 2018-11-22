<div class="form-group">
	<label for="field-{{ $field['name'] }}">{{ $field['label'] }}: </label>
	<textarea id="field-{{ $field['name']}}" name="{{ $field['name'] }}" class="form-control render-{{ $field['field_type']['type'] }}">{{ old($field['name'],$field['value']) }}</textarea>
</div>