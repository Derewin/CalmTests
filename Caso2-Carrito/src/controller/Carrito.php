<?php

class Carrito
{
    public function __construct(
        private array $productos = []
    ) {
    }



    /**
     * Get the value of productos
     */
    public function getProductos(): array
    {
        return $this->productos;
    }

    /**
     * Set the value of productos
     */
    public function addProducto(Producto $producto)
    {
        $this->productos[] = $producto;

        return $this;
    }

    public function sacarProducto(Producto $producto)
    {
        // Buscar el producto en el carrito y eliminarlo
        foreach ($this->productos as $key => $p) {
            if ($p === $producto) {
                unset($this->productos[$key]);
                break;
            }
        }
    }

    public function contarProductos()
    {
        return count($this->productos);
    }

    public function calcularSubtotalPorProducto()
    {
        $subtotalPorProducto = [];

        foreach ($this->productos as $producto) {
            $subtotalPorProducto[$producto->getNombre()] = $producto->getPrecio();
        }

        return $subtotalPorProducto;
    }

    public function calcularMontoTotal()
    {
        $montoTotal = 0;

        foreach ($this->productos as $producto) {
            $montoTotal += $producto->getPrecio();
        }

        return $montoTotal;
    }

    public function verificarEnvio()
    {
        $pesoTotal = 0;

        foreach ($this->productos as $producto) {
            $pesoTotal += $producto->getPeso();
        }

        return $pesoTotal < 5;
    }
}
