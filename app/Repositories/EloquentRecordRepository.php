<?php
namespace App\Repositories;

use App\Repositories\Contracts\RecordRepositoryContract;
use App\Models\Record;

class EloquentRecordRepository implements RecordRepositoryContract
{
	protected $record;

	public function __consctruct(Record $record)
	{
		$this->record = $record;
	}

	/**
	 * Retorna todas las Records.
	 *
	 * @return array|Record[]
	 */
	public function all()
	{
		return Record::all();
		//return Record::withTrashed()->with(['director', 'generos'])->get();
	}

	/**
	 * Retorna el Record con la pk $pk.
	 *
	 * @param int $pk
	 * @return Record|null
	 */
	public function find($pk)
	{
		return Record::find($pk);
	}

	/**
	 * Retorna el Record con la pk $pk.
	 *
	 * @param int $pk
	 * @return Record|null
	 */
	public function eagerFind($pk)
	{
		return Record::with('rel_record_type.fields.fieldType','rel_user','fields.fieldType','fields.recordValue')->get()->find($pk);
	}

	/**
	 * Retorna el con el campo
	 *
	 * @param int $pk
	 * @return Record|null
	 */
	public function where($key,$value)
	{
		return Record::where($key,$value)->get();
	}

	/**
	 * Graba la $data en la base de datos.
	 *
	 * @param array $data
	 * @return Record
	 */
	public function create($data)
	{
		$record = Record::create($data);
		return $record;
	}
}