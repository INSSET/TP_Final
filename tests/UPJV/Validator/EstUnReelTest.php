<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\EstUnReel;

class EstUnReelTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new EstUnReel();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new EstUnReel();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new EstUnReel();

        // Test avec une chaîne de caractères plus courte que la longueur minimale
        $this->assertFalse($validator->verifie("1"));

        // Test avec une chaîne de caractères de longueur minimale
        $this->assertTrue($validator->verifie("1.0"));

        // Test avec une chaîne de caractères plus longue que la longueur minimale
        $this->assertTrue($validator->verifie("1.3264574"));
    }

    public function testGetMsgInfo()
    {
        $validator = new EstUnReel();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Nombre reel demandés", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("1");
        $this->assertEquals("Le nombre n'est pas un reel", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("1.0");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}