<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart\Carrito;
use App\Cart\CarritoItem;
use App\Models\Record;

class CarritoTest extends TestCase
{
	/** @var Carrito */
	protected $cart;

	public function setUp()
	{
		parent::setUp();
		$this->cart = new Carrito;
	}

	public function testAddItemQueAgregueElItemCorrecto()
	{
		// Ejecutamos los métodos.
		// $record = new Record;
		// $record->id_record = 1;
		// $item = new CarritoItem($record);
		$item = $this->createItem(1);
		$this->cart->addItem($item);

		// Verificamos si todo funciona bien.
		$items = $this->cart->getItems();
		// Verificamos que dentro de $items exista
		// $item.
		$this->assertContains($item, $items);
	}

	public function testAddItemQuePuedaAgregar2ItemsDistintos()
	{
		$item = $this->createItem(1);
		$item2 = $this->createItem(4);
		$this->cart->addItem($item);
		$this->cart->addItem($item2);

		$items = $this->cart->getItems();

		$this->assertContains($item, $items);
		$this->assertContains($item2, $items);
		$this->assertCount(2, $items);
	}

	public function testAddItemQuePuedaAgregar2ItemsIguales()
	{
		$item = $this->createItem(1);
		$item2 = $this->createItem(1);
		$this->cart->addItem($item);
		$this->cart->addItem($item2);

		$items = $this->cart->getItems();

		$this->assertCount(1, $items);
		$this->assertSame(1, $items[0]->getRecord()->id_record);
		$this->assertSame(2, $items[0]->getCantidad());
	}

	public function testRemoveItemEliminaElItemCorrectamente()
	{
		$id = 1;
		$item = $this->createItem($id);
		$this->cart->addItem($item);
		
		// $items = $this->cart->getItems();
		// $this->assertContains($item, $items);

		$this->cart->removeItem($id);
		
		$items = $this->cart->getItems();

		$this->assertNotContains($item, $items);
		$this->assertCount(0, $items);
	}

	/**
	 * Crea un CarritoItem con el $id provisto.
	 *
	 * @param int $id
	 */
	public function createItem($id)
	{
		$record = new Record;
		$record->id_record = $id;
		$item = new CarritoItem($record);
		return $item;
	}
}
