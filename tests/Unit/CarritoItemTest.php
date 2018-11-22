<?php

namespace Tests\Unit;

// TestCase es la clase de la cual deben heredar todos los tests.
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart\CarritoItem;
use App\Cart\Exceptions\CarritoItemCantidadNegativaException;
use App\Models\Record;

class CarritoItemTest extends TestCase
{
    /** @var Record Instancia usada para crear cada CarritoItem. */
    protected $record;

    public function setUp()
    {
        // Primero, llamamos al setUp del padre.
        parent::setUp();
        // Creamos la Record a utilizar en cada test.
        $this->record = new Record;
        $this->record->id_record = 1;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function testNewCarritoItemCreaNuevaInstancia()
 	{
 		$item = new \App\Cart\CarritoItem;

 		// $this->assertTrue(get_class($item) == "App\\Cart\\CarritoItem");
 		// Siempre, los asserts que comparan dos valores,
 		// reciben primero el valor que esperamos, y segundo
 		// el valor "actual"/real.
 		$this->assertInstanceOf(\App\Cart\CarritoItem::class, $item);
 	}

    public function testPuedoCrearCarritoItemConUnaRecord()
    {
        // Creamos la record para crear el item.
        // $record = new Record;
        // $record->id_record = 1;
        $record = $this->record;

        // Creamos el item con la record.
        $item = new CarritoItem($record);

        // Testeamos que getRecord nos retorne una record.
        $this->assertInstanceOf(Record::class, $item->getRecord());

        // Testeamos que esa record sea la misma que le pasamos en
        // el constructor.
        $this->assertSame($record, $item->getRecord());

        // Testeamos que la cantidad sea 1.
        $this->assertSame(1, $item->getCantidad());
    }

    public function testPuedoCrearCarritoItemConUnaCantidadDe4()
    {
        // Creamos los valores para el constructor.
        $cantidad = 4;
        // $record = new Record;
        // $record->id_record = 1;
        $record = $this->record;
        // Instanciamos el CarritoItem con esos valores.
        $item = new CarritoItem($record, $cantidad);

        $this->assertSame($cantidad, $item->getCantidad());
    }

    // Usando la "Annotation" de @expectedException
    /**
     * @expectedException App\Cart\Exceptions\CarritoItemCantidadNegativaException
     */
    public function testCrearCarritoItemConCantidadNegativaLanzaException()
    {
        // Indicamos la Exception que esperamos recibir.
        // $this->expectException(CarritoItemCantidadNegativaException::class);

        $cantidad = -4;
        // $record = new Record;
        // $record->id_record = 1;
        $record = $this->record;

        $item = new CarritoItem($record, $cantidad);
    }

    /* Ejemplos testeando las distintas combinaciones del getSubtotal
    a mano */
    /*public function testGetSubtotalRetornaElValorCorrecto()
    {
        $precio = 50;
        $record = new Record;
        $record->id_record = 1;
        $record->precio = $precio;
        $item = new CarritoItem($record);

        $this->assertSame($precio, $item->getSubtotal());
    }

    public function testGetSubtotalRetornaElValorCorrectoOtraVez()
    {
        $precio = 30;
        $cantidad = 5;
        $total = 150;
        $record = new Record;
        $record->id_record = 1;
        $record->precio = $precio;
        $item = new CarritoItem($record, $cantidad);

        $this->assertSame($total, $item->getSubtotal());
    }

    public function testGetSubtotalRetornaElValorCorrectoConDecimales()
    {
        $precio = 30.5;
        $cantidad = 5;
        $total = 152.5;
        $record = new Record;
        $record->id_record = 1;
        $record->precio = $precio;
        $item = new CarritoItem($record, $cantidad);

        $this->assertSame($total, $item->getSubtotal());
    }*/

    // Variante para probar getSubtotal con el data provider
    // Solo con la annotation de "@dataProvider" ya este test
    // se va a ejecutar una vez por cada combinación de valores indicada.
    // Cada valor de la combinación va a ir a parar al argumento 
    // equivalente. Es decir, el primer item del array de valores va para
    // el primer argumento. El segundo item del array va para el segundo
    // argumento. Etc.
    /**
     * @dataProvider precioCantidadProvider
     */
    public function testGetSubtotalRetornaElValorCorrecto($precio, $cantidad, $total)
    {
        // $record = new Record;
        // $record->id_record = 1;
        $record = $this->record;
        $record->precio = $precio;
        $item = new CarritoItem($record, $cantidad);

        $this->assertSame($total, $item->getSubtotal());
    }


    // Creamos nuestro data provider.
    public function precioCantidadProvider()
    {
        return [
            [
                50, // precio
                1, // cantidad
                50, // total / expected
            ],
            [
                30, // precio
                5, // cantidad
                150, // total / expected
            ],
            [
                30.5, // precio
                5, // cantidad
                152.5, // total / expected
            ],
            [
                10, // precio
                10, // cantidad
                100, // total / expected
            ],
            [
                10, // precio
                .5, // cantidad
                5.0, // total / expected
            ],
        ];
    }
}
