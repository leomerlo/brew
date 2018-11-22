<?php
namespace App\Http\Controllers;

use App\Models\RecordType;
use Illuminate\Http\Request;

class RecordTypesController
{

	public function index()
	{

		$record_types = RecordType::all();

		return view('recordType.listing', ['list' => $record_types]);
	}

	public function add()
	{
		return view('recordType.formAdd');
	}

	public function store(Request $request)
	{
		$request->validate(RecordType::$rules);
		$formData = $request->except(['_token']);

		if(!isset($formData['slug']) || $formData['slug'] == ''){
			$formData['slug'] = str_slug($formData['type']);
		}

		$record = RecordType::create($formData);

		return redirect()
				->route('recordType.formAdd')
				->with('message', 'El tipo de record <b>' . $formData['type'] . "</b> se agregó exitosamente!");
	}

	public function edit($id)
	{
		$recordType = RecordType::with('fields')->get()->find($id);
		return view('recordType.formEdit', ['recordType' => $recordType]);
	}

	public function editStore(Request $request, $id)
	{
		// Validamos
		$request->validate(RecordType::$rules);

		$input = $request->except(['_token', '_method']);

		if(!isset($input['show_on_menu'])){
			$input['show_on_menu'] = 0;
		}

		$recordType = RecordType::find($id);
		$recordType->fill($input);
		$recordType->save();

		return redirect()
				->route('recordType.formEdit', ['id' => $id])
				->with('message', 'El tipo de record <b>' . $recordType->type . '</b> fue editado exitosamente :D');
	}

	public function delete($id)
	{
		$record_type = RecordType::find($id);
		$record_type->delete();

		return redirect()
				->route('recordType.index')
				->with('message', 'El tipo de record <b>' . $record_type->type . "</b> fue eliminado exitosamente");
	}

	public function restore($id)
	{
		$record_type = RecordType::withTrashed()->get()->find($id);
		$record_type->restore();

		return redirect()
				->route('recordType.index')
				->with('message', 'El tipo de record <b>' . $record_type->type . "</b> fue restaurado exitosamente");
	}

	public function view($slug)
	{
		$recordType = RecordType::where('slug',$slug)->first();
		
		return view('recordType.view', ['recordType' => $recordType]);
	}

}