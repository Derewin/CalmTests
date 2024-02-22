<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/controller/AccountOwner.php";
require __DIR__ . "/../src/controller/AccountType.php";
require __DIR__ . "/../src/controller/Account.php";

final class AccountTest extends TestCase
{
    public function testTieneTitularValido()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");

        $tipoCuenta = new AccountType("1", "corriente", 15, 3000, 0);

        $cuenta = new Account($titular, $tipoCuenta);

        $this->assertTrue(is_a($cuenta->getTitular(), 'AccountOwner'));
    }

    public function testTipoCuentaValido()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");
        $tipoCuenta = new AccountType("1", "corriente", 15, 3000, 0);
        $cuenta = new Account($titular, $tipoCuenta);

        $this->assertTrue(is_a($cuenta->getTipoCuenta(), 'AccountType'));
    }

    public function testLimiteRetiro()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");
        $tipoCuenta = new AccountType("1", "sueldo", 0, 0, 500);
        $cuenta = new Account($titular, $tipoCuenta, 1500);

        $this->assertEquals($cuenta->retirarSaldo(-600), "El monto a retirar debe ser positivo");

        $this->assertEquals($cuenta->retirarSaldo(600), "Supera el límite de retiro");

        $this->assertEquals($cuenta->retirarSaldo(500), "Retiro con exito");
    }

    public function testRetiroSaldoDescubierto()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");
        $tipoCuenta = new AccountType("1", "corriente", 15, 200, 0);
        $cuenta = new Account($titular, $tipoCuenta, 1500);

        $this->assertEquals($cuenta->retirarSaldo(1800), "Descubierto superado para retiro");

        $this->assertEquals($cuenta->retirarSaldo(1700), "Retiro con exito");
    }

    public function testAgregarSaldo()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");
        $tipoCuenta = new AccountType("1", "corriente", 15, 3000, 0);
        $cuenta = new Account($titular, $tipoCuenta, 1500);

        print($cuenta->addSaldo(500));

        $this->assertEquals($cuenta->getSaldo(), 2000);
    }

    public function testCalculaInteres()
    {
        $titular = new AccountOwner("Pepe", "correo@correo.com", "telefono Contacto");
        $tipoCuenta = new AccountType("1", "corriente", 15, 3000, 0);
        $cuenta = new Account($titular, $tipoCuenta, 10);

        $fechaCreación = new DateTime('2023-01-01');

        $cuenta->setCreationDate($fechaCreación);

        // Tiempo transcurrido a hoy = 13 meses
        // x interés = 13 x 15 => 195

        $this->assertEquals($cuenta->calcInteres(), 195);

        $this->assertEquals($cuenta->calcInteres(), 100);
    }
}
