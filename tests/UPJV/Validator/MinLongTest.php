<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\MinLong;

class MinLongTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new MinLong();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new MinLong();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new MinLong();

        // Test avec une chaîne de caractères plus courte que la longueur minimale
        $this->assertFalse($validator->verifie("ab"));

        // Test avec une chaîne de caractères de longueur minimale
        $this->assertTrue($validator->verifie("abc"));

        // Test avec une chaîne de caractères plus longue que la longueur minimale
        $this->assertTrue($validator->verifie("abcdef"));
    }

    public function testGetMsgInfo()
    {
        $validator = new MinLong();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Nombre minimal de caractères demandés : 3", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("ab");
        $this->assertEquals("Le nombre de caractère est inférieur à 3", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("abc");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
