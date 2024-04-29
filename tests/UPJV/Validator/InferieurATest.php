<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\InferieurA;

class InferieurATest extends TestCase
{
    public function testConstructor()
    {
        $validator = new InferieurA();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new InferieurA();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new InferieurA();

        // Test avec un nombre plus grand que la référence
        $this->assertFalse($validator->verifie(15));

        // Test avec un nombre égal à la référence
        $this->assertFalse($validator->verifie(10));

        // Test avec un nombre plus petit que la référence
        $this->assertTrue($validator->verifie(5));
    }

    public function testGetMsgInfo()
    {
        $validator = new InferieurA();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Nombre de référence pour comparer : 10", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie(15);
        $this->assertEquals("C PO BIEN CAR NOMBRE ENTRÉ SUPÉRIEUR OU ÉGAL À 10", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie(5);
        $this->assertEquals("C'est goude car votre valeur est inférieur à  10!", $validator->getMsgInfo());
    }
}
