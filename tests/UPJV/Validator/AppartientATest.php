<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\AppartientA;

class AppartientATest extends TestCase
{
    public function testConstructor()
    {
        $validator = new AppartientA();

        $this->assertNull($validator->getData());
    }

    public function testVerifie()
    {
        $validator = new AppartientA();

        // Test avec une autre chaîne de caractères 
        $this->assertFalse($validator->verifie("hello"));

        // Test avec la meme expression
        $this->assertTrue($validator->verifie("detecte"));
    }

    public function testGetMsgInfo()
    {
        $validator = new AppartientA();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("L'expression est : detecte", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("hello");
        $this->assertEquals("L'expression doit être detecte", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("detecte");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
