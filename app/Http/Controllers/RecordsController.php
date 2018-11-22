<?php
namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\RecordType;
use App\Models\Field;
use App\User;
use App\Repositories\Contracts\RecordRepositoryContract;
use Illuminate\Http\Request;

class RecordsController
{
	/** @var RecordRepositoryContract */
	protected $repo;

	/**
	 * Constructor.
	 *
	 * @param RecordRepositoryContract $repo
	 */
	public function __construct(RecordRepositoryContract $repo)
	{
		$this->repo = $repo;
	}

	public function index($slug)
	{
		$rt = RecordType::where('slug',$slug)->firstOrFail();
		$list = $this->repo->where('record_type',$rt->id);

		return view('records.listing', [ 'list' => $list, 'slug' => $slug ]);
	}

	public function detalles($id)
	{
		$record = $this->repo->find($id);

		return view('records.detalles', compact('record'));
	}

	public function add($slug)
	{
		$record_type = RecordType::with('fields.fieldType')->get()->where('slug',$slug)->first();

		if(!$record_type){
			return redirect()
				->route('recordType.index')
				->with('message', 'No se encontró el tipo de records que estas buscando.');
		}


		return view('records.formAdd', ['record_type' => $record_type]);
	}

	public function store(Request $request, $slug)
	{
		$request->validate(Record::$rules);

		$formData = $request->except(['_token']);

		$record = $this->repo->create($formData,$slug);

		$record->rel_record_type()->associate(RecordType::where('slug',$slug)->first());
		$record->rel_user()->associate(User::first());

		$fields = $record->rel_record_type->fields;

		foreach($fields as $field){
			$record->fieldsValues()->create(['value' => $formData[$field['name']],'field' => $field['id'], 'record' => $record['id']]);
		}

		$record->save();

		return redirect()
				->route('record.index', ['slug' => $slug])
				->with('message', 'La record <b>' . $formData['title'] . "</b> se agregó exitosamente! :D");
	}

	public function edit($id)
	{
		$record = $this->repo->eagerFind($id);
		$fields = $record->AllFieldsWithValues;

		return view('records.formEdit', [
			'record' => $record,
			'record_type' => $record->rel_record_type,
			'comments' => $record->comments,
			'fields' => $fields
		]);
	}

	public function editStore(Request $request, $id)
	{

		$rules = Record::$rules;
		$rules['slug'] = 'min:3|unique:records,slug,'.$id;

		$request->validate($rules);
		$formData = $request->except(['_token', '_method']);

		if(!isset($formData['show_on_menu'])){
			$formData['show_on_menu'] = 0;
		}

		$record = $this->repo->eagerFind($id);
		$record_fields = $record->fields->toArray();
		$recordType_fields = $record->rel_record_type->fields->toArray();

		$fields = array_merge($record_fields,$recordType_fields);

		foreach($fields as $field){

			if(isset($formData[$field['name']])){
				if($request->hasFile($field['name'])) {
					$imagen = $request->file($field['name']);
					$nombreImagen = $imagen->hashName();
					$imagen->move(public_path('/imgs'), $nombreImagen);
					$formData[$field['name']] = $nombreImagen;
				}

				if(isset($record->existingFields[$field['id']])){
					$record->existingFields[$field['id']]->update(['value' => $formData[$field['name']]]);
				} else {
					$record->fieldsValues()->create(['value' => $formData[$field['name']],'field' => $field['id'], 'record' => $record['id']]);
				}
			}
		}

		$record->fill($formData);
		$record->save();

		return redirect()
				->route('record.index', ['slug' => $record->rel_record_type->slug])
				->with('message', 'La record <b>' . $formData['title'] . "</b> se editó exitosamente!");
	}

	public function delete(Request $request, $id)
	{

		$record = $this->repo->find($id);
		$record->delete();

		return redirect()
				->route('record.index', ['slug' => $record->rel_record_type->slug])
				->with('message', 'El record <b>' . $record->titulo . "</b> fue eliminada exitosamente");
	}

	public function restore($id)
	{
		$record = Record::withTrashed()->with('rel_record_type')
						->whereId($id)
						->first();
		$record->restore();

		return redirect()
				->route('record.index', ['slug' => $record->rel_record_type->slug])
				->with('message', 'El record <b>' . $record->titulo . "</b> fue restaurado exitosamente");
	}
	
}