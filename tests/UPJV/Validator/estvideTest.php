<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\estvide;

class MinLongTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new estvide();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new estvide();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new estvide();

        // Test avec une case rempli
        $this->assertFalse($validator->verifie("ab"));

        // Test avec une case vide
        $this->assertTrue($validator->verifie("abc"));

    }

    public function testGetMsgInfo()
    {
        $validator = new estvide();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("la case doit etre vide", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("ab");
        $this->assertEquals("effacer", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("abc");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
