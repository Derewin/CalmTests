<?php

class Account
{

    public function __construct(
        private AccountOwner $titular,
        private AccountType $tipo_cuenta,
        private int $saldo = 0,
        private DateTime $creation_date = new DateTime("now"),
    ) {
    }

    /**
     * Get the value of limite
     */
    public function getLimite(): int
    {
        return $this->tipo_cuenta->getLimite();
    }

    /**
     * Get the value of Saldo
     */
    public function getSaldo(): int
    {
        return $this->saldo;
    }

    /**
     * Set the value of Saldo
     */
    public function addSaldo(int $ingreso)
    {
        if ($ingreso < 0) {
            return "El monto a ingresar debe ser positivo";
        }

        $saldoNuevo = $this->getSaldo() + $ingreso;

        print $saldoNuevo;

        $this->setSaldo($saldoNuevo);
        return "Agregado Correctamente";
    }

    public function retirarSaldo(int $retiro)
    {
        if ($retiro < 0) {
            return "El monto a retirar debe ser positivo";
        }

        if ($this->tipo_cuenta->getNombre() == "sueldo") {
            if ($retiro > $this->tipo_cuenta->getLimite()) {
                return "Supera el límite de retiro";
            }
        }

        $saldoNuevo = $this->getSaldo() - $retiro;


        if ($saldoNuevo < 0 && $this->tipo_cuenta->getNombre() == "sueldo") {
            return "Fondos Insuficientes";
        }

        if ($saldoNuevo < 0 && $this->tipo_cuenta->getNombre() == "corriente") {
            $descubierto = $this->tipo_cuenta->getDescubierto();
            if (-$descubierto > $saldoNuevo) {
                return "Descubierto superado para retiro";
            }
        }

        $this->setSaldo($saldoNuevo);

        return "Retiro con exito";
    }



    public function getInfo()
    {
        $mensaje = "";
        $titular = "El titular de la cuenta es: " +  $this->titular->getName() + "\n";
        $saldoDisponible = "El Saldo disponible es: " + $this->getSaldo();
        +"\n";
        $tipoCuenta = "El tipo de cuenta es: " + $this->tipo_cuenta->getNombre() + "\n";

        $mensaje = $titular + $saldoDisponible + $tipoCuenta;

        if ($tipoCuenta == "corriente") {
            $interes = "El interes es de: " + $this->tipo_cuenta->getInteres();
            $descubierto = "El descubierto es de: " + $this->tipo_cuenta->getDescubierto();
            $mensaje += $interes + $descubierto;
        }

        if ($tipoCuenta == "sueldo") {
            $limite = "El límite de retiro de la cuenta es: " + $this->tipo_cuenta->getLimite();
            $mensaje += $limite;
        }

        return $mensaje;
    }

    public function calcInteres()
    {
        if ($this->tipo_cuenta->getNombre() != "corriente") {
            return "Cuenta no disponible para esta operación";
        }

        $fechaHoy = new DateTime("now");
        $diferenciaFechas = $fechaHoy->diff($this->creation_date);
        $diferenciaMeses = $diferenciaFechas->format("%m");
        $diferenciaAnios = $diferenciaFechas->format("%y") * 12;

        $diferenciaTotal = $diferenciaMeses + $diferenciaAnios;

        $interesTotal = $this->tipo_cuenta->getInteres() * $diferenciaTotal;

        return $interesTotal;
    }

    /**
     * Get the value of titular
     */
    public function getTitular(): AccountOwner
    {
        return $this->titular;
    }

    /**
     * Set the value of titular
     */
    public function setTitular(AccountOwner $titular): self
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get the value of tipo_cuenta
     */
    public function getTipoCuenta(): AccountType
    {
        return $this->tipo_cuenta;
    }

    /**
     * Set the value of tipo_cuenta
     */
    public function setTipoCuenta(AccountType $tipo_cuenta): self
    {
        $this->tipo_cuenta = $tipo_cuenta;

        return $this;
    }

    /**
     * Set the value of saldo
     */
    private function setSaldo(int $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    /**
     * Get the value of creation_date
     */
    public function getCreationDate(): DateTime
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     */
    public function setCreationDate(DateTime $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}
