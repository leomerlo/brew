<div class="form-group">
	<label for="{{ $field['name'] }}">{{ $field['label'] }}: </label>
	<input type="text" name="{{ $field['name'] }}" class="form-control render-{{ $field['field_type']['type'] }}" value="{{ old($field['name'],$field['value']) }}" />
</div>