<?php

class AccountType
{
    public function __construct(
        private int $id,
        private string $nombre,
        private float $interes,
        private float $descubierto,
        private float $limite,
    ) {
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of interes
     */
    public function getInteres(): float
    {
        return $this->interes;
    }

    /**
     * Set the value of interes
     */
    public function setInteres(float $interes): self
    {
        $this->interes = $interes;

        return $this;
    }

    /**
     * Get the value of descubierto
     */
    public function getDescubierto(): float
    {
        return $this->descubierto;
    }

    /**
     * Set the value of descubierto
     */
    public function setDescubierto(float $descubierto): self
    {
        $this->descubierto = $descubierto;

        return $this;
    }

    /**
     * Get the value of limite
     */
    public function getLimite(): float
    {
        return $this->limite;
    }

    /**
     * Set the value of limite
     */
    public function setLimite(float $limite): self
    {
        $this->limite = $limite;

        return $this;
    }
}
