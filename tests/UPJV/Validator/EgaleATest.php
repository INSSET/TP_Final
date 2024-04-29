<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\EgaleA;

class EgaleATest extends TestCase
{
    public function testConstructor()
    {
        $validator = new EgaleA();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new EgaleA();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new EgaleA();

        // Test avec un nombre inférieur  minimale
        $this->assertFalse($validator->verifie("2"));

        // Test avec nombre minimal
        $this->assertTrue($validator->verifie("3"));

        // Test avec un nombre supérieur minimale
        $this->assertTrue($validator->verifie("5"));
    }

    public function testGetMsgInfo()
    {
        $validator = new EgaleA();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("un nombre égal à 3", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie(2);
        $this->assertEquals("Le nombre est inférieur ou supérieur à 3", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie(3);
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}