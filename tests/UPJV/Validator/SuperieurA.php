<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\SuperieurA;

class SuperieurATest extends TestCase
{
    public function testConstructor()
    {
        $validator = new SuperieurA();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new SuperieurA();
        $validator->verifie("test_data");

        $this->assertEquals("test_data", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new SuperieurA();

        // Test avec un nombre inférieur à la valeur fixée
        $this->assertFalse($validator->verifie(5));

        // Test avec un nombre supérieur à la valeur fixée
        $this->assertTrue($validator->verifie(150));

        // Test avec une chaîne de caractères
        $this->assertFalse($validator->verifie("abcdef"));
    }

    public function testGetMsgInfo()
    {
        $validator = new SuperieurA();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Aucune valeur saisie", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie(2);
        $this->assertEquals("Le nombre doit être supérieur", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie(88);
        $this->assertEquals("C'est tout bon !", $validator->getMsgInfo());
    }
}
