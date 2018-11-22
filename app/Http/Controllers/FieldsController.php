<?php
namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\RecordType;
use App\Models\FieldType;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldsController
{

	public function index()
	{

		$fields = Field::all();
		$recordTypes = RecordType::all();
		$recordIds = Record::all();

		return view('fields.listing', ['list' => $fields, 'recordTypes' => $recordTypes, 'recordIds' => $recordIds]);
	}

	public function indexFilter(Request $request)
	{
		$formData = $request->except(['_token']);

		$recordTypes = RecordType::all();
		$recordIds = Record::all();

		if(isset($formData['recordType'])){
			$fieldRecord = RecordType::find($formData['recordType']);
			$fieldRecord['name'] = $fieldRecord->type;
		}

		if(isset($formData['recordId'])){
			$fieldRecord = Record::find($formData['recordId']);
			$fieldRecord['name'] = $fieldRecord->title;
		}

		$fields = $fieldRecord->fields()->get();

		return view('fields.listing', ['list' => $fields, 'recordTypes' => $recordTypes, 'recordIds' => $recordIds, 'filter' => $fieldRecord]);
	}

	public function add()
	{
		$record_types = [];
		foreach (RecordType::all()->ToArray() as $type) {
			$record_types[$type['id']] = $type['type'];
		}
		$records = [];
		foreach (Record::all()->ToArray() as $type) {
			$records[$type['id']] = $type['title'];
		}
		$field_types = [];
		foreach (FieldType::all()->ToArray() as $type) {
			$field_types[$type['id']] = $type['name'];
		}

		return view('fields.formAdd', [
			'record_types' => $record_types,
			'records' => $records,
			'field_types' => $field_types,
		]);
	}

	public function store(Request $request)
	{
		$request->validate(Field::$rules);
		$formData = $request->except(['_token']);

		// Seteamos el formato para las opciones
		$options = $formData['options'] ? $formData['options'] : [];
		$formData['options'] = Field::formatOptionsJSON($options);

		$field = Field::create($formData);

		// Guardamos el tipo
		$type = FieldType::find($formData['type']);
		$field->fieldType()->save($type);

		// Guardamos los tipos de record a los que se asocia.
		if(isset($formData['record_types'])){
			$field->recordTypes()->attach($formData['record_types']);
		}

		if(isset($formData['record_ids'])){
			$field->recordIds()->attach($formData['record_ids']);
			$field->recordValue()->attach($formData['record_ids'],['value' => '']);
		}

		$field->save();

		return redirect()
				->route('fields.formAdd')
				->with('message', 'El campo <b>' . $formData['name'] . "</b> se agregó exitosamente! :D");
	}

	public function edit($id)
	{
		$field = Field::with(['recordTypes','recordIds'])->get()->find($id);

		$record_types = [];
		foreach (RecordType::all()->ToArray() as $type) {
			$record_types[$type['id']] = $type['type'];
		}

		$records = [];
		foreach (Record::all()->ToArray() as $type) {
			$records[$type['id']] = $type['title'];
		}

		$field_types = [];
		foreach (FieldType::all()->ToArray() as $type) {
			$field_types[$type['id']] = $type['name'];
		}

		$field['options'] = Field::formatOptionsString($field['options']);

		return view('fields.formEdit', [
			'field' => $field,
			'records' => $records,
			'record_types' => $record_types,
			'field_types' => $field_types,
		]);
	}

	public function editStore(Request $request, $id)
	{
		// Validamos
		$request->validate(Field::$rules);
		$formData = $request->except(['_token', '_method']);
		$field = Field::find($id);

		// Guardamos el tipo
		$type = FieldType::find($formData['type']);

		// Guardamos los tipos de record a los que se asocia.
		if(!isset($formData['record_types'])){
			$formData['record_types'] = [];
		}
		$field->recordTypes()->sync($formData['record_types']);

		if(!isset($formData['record_ids'])){
			$formData['record_ids'] = [];
		}
		$field->recordIds()->sync($formData['record_ids']);

		// Seteamos el formato para las opciones
		$options = $formData['options'] ? $formData['options'] : [];
		$formData['options'] = Field::formatOptionsJSON($options);

		$field->fill($formData);
		$field->save();

		return redirect()
				->route('fields.formEdit', ['id' => $id])
				->with('message', 'El campo <b>' . $field->label . '</b> fue editado exitosamente :D');
	}

	public function delete($id)
	{
		$field = Field::find($id);
		$field->recordValue()->detach();
		$field->delete();

		return redirect()
				->route('fields.index')
				->with('message', 'El campo <b>' . $field->label . "</b> fue eliminado exitosamente");
	}

	public function restore($id)
	{
		$field = Field::withTrashed()->get()->find($id);
		$field->restore();

		return redirect()
				->route('fields.index')
				->with('message', 'El campo <b>' . $field->label . "</b> fue restaurado exitosamente");
	}
	
}