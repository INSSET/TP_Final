<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\nbrReponseMin;

class nbrReponseMinTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new nbrReponseMin();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new nbrReponseMin();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new nbrReponseMin();

        // Test avec une chaîne de caractères plus courte que la longueur minimale
        $this->assertFalse($validator->verifie("2"));

        // Test avec une chaîne de caractères de longueur minimale
        $this->assertTrue($validator->verifie("1,2,3"));

        // Test avec une chaîne de caractères plus longue que la longueur minimale
        $this->assertTrue($validator->verifie("1,2,3,4,5,6,7,8,9"));
    }

    public function testGetMsgInfo()
    {
        $validator = new nbrReponseMin();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Nombre minimal de réponse demandé : 3", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("2");
        $this->assertEquals("Le nombre de réponses est inférieur à 3", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("1,2,3");
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
