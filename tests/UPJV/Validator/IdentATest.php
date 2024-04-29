<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\IdentA;

class IdentATest extends TestCase
{
    public function testConstructor()
    {
        $validator = new IdentA();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new IdentA();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new IdentA();

        // Test avec une chaîne de caractères plus courte que la longueur minimale
        $this->assertTrue($validator->verifie("verte"));

        // Test avec une chaîne de caractères de longueur minimale
        $this->assertFalse($validator->verifie("vert"));

        // Test avec une chaîne de caractères plus longue que la longueur minimale
        $this->assertFalse($validator->verifie("vertes"));
    }

    public function testGetMsgInfo()
    {
        $validator = new IdentA();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("mot demandé  : verte", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("vertes");
        $this->assertEquals("Le mot rentré n'est pas verte", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("verte");
        $this->assertEquals("La couleur des pommes", $validator->getMsgInfo());
    }
}
