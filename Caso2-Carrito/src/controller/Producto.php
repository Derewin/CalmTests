<?php

class Producto
{
    public function __construct(
        private String $nombre,
        private float $precio,
        private float $peso,
    ) {
    }

    /**
     * Get the value of precio
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of peso
     */
    public function getPeso(): float
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     */
    public function setPeso(float $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): String
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(String $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
