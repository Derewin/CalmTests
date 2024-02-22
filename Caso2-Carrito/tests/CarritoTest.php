<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/controller/Carrito.php";
require __DIR__ . "/../src/controller/Producto.php";

class CarritoTest extends TestCase
{
    public function testAgregarProducto()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 2);

        $carrito->addProducto($productoX);

        $this->assertEquals(1, $carrito->contarProductos());
    }

    public function testSacarProducto()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 2);
        $productoY = new Producto('Y', 15, 1.5);

        $carrito->addProducto($productoX);
        $carrito->addProducto($productoY);

        $carrito->sacarProducto($productoX);

        $this->assertEquals(1, $carrito->contarProductos());
    }

    public function testCalcularSubtotalPorProducto()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 2);
        $productoY = new Producto('Y', 15, 1.5);

        $carrito->addProducto($productoX);
        $carrito->addProducto($productoY);

        $expectedSubtotal = ['X' => 10, 'Y' => 15];
        $this->assertEquals($expectedSubtotal, $carrito->calcularSubtotalPorProducto());
    }

    public function testCalcularMontoTotal()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 2);
        $productoY = new Producto('Y', 15, 1.5);

        $carrito->addProducto($productoX);
        $carrito->addProducto($productoY);

        $this->assertEquals(25, $carrito->calcularMontoTotal());
    }

    public function testVerificarEnvio()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 2);
        $productoY = new Producto('Y', 15, 1.5);

        $carrito->addProducto($productoX);
        $carrito->addProducto($productoY);

        $this->assertTrue($carrito->verificarEnvio());
    }

    public function testVerificarEnvioPesoExcedido()
    {
        $carrito = new Carrito();
        $productoX = new Producto('X', 10, 3);
        $productoY = new Producto('Y', 15, 2);

        $carrito->addProducto($productoX);
        $carrito->addProducto($productoY);

        $this->assertFalse($carrito->verificarEnvio());
    }
}
