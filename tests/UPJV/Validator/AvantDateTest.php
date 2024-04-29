<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\AvantDate;

class AvantDateTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new AvantDate();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new AvantDate();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new AvantDate();

        // Test avec une chaîne de caractères plus courte que la longueur minimale
        $this->assertFalse($validator->verifie("2024-04-22"));

        // Test avec une chaîne de caractères de longueur minimale
        $this->assertTrue($validator->verifie("2024-04-19"));

        // Test avec une chaîne de caractères plus longue que la longueur minimale
        $this->assertTrue($validator->verifie("2024-03-01"));
    }

    public function testGetMsgInfo()
    {
        $validator = new AvantDate();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Date à ne pas dépasser : 2024-04-20", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("2024-04-22");
        $this->assertEquals("La date dépasse le 2024-04-20", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("2024-04-19");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
