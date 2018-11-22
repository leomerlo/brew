<?php
namespace App\Repositories\Contracts;

/**
 * Define los métodos para los repos de records.
 */
interface RecordRepositoryContract
{
	/**
	 * Retorna todos las records.
	 */
	public function all();

	/**
	 * Retorna la record por su PK.
	 *
	 * @param mixed $pk
	 */
	public function find($pk);

	public function create($data);
	/*public function update();
	public function delete();*/
}