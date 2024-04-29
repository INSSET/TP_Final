<?php

namespace UPJV\Validator;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use UPJV\Validator\UrlValidator;

class UrlValidatorTest extends TestCase
{
    public function testConstructor()
    {
        $validator = new UrlValidator();

        $this->assertNull($validator->getData());
    }

    public function testDataGetterSetter()
    {
        $validator = new UrlValidator();
        $validator->verifie("https://example.com");

        $this->assertEquals("https://example.com", $validator->getData());
    }

    public function testVerifie()
    {
        $validator = new UrlValidator();

        // Test avec une URL valide
        $this->assertTrue($validator->verifie("https://example.com"));

        // Test avec une URL invalide
        $this->assertFalse($validator->verifie("invalid_url"));
    }

    public function testGetMsgInfo()
    {
        $validator = new UrlValidator();

        // Test lorsque le test n'a pas encore été exécuté
        $this->assertEquals("Veuillez fournir une URL valide.", $validator->getMsgInfo());

        // Test lorsque le test échoue
        $validator->verifie("invalid_url");
        $this->assertEquals("La chaîne n'est pas une URL valide.", $validator->getMsgInfo());

        // Test lorsque le test réussit
        $validator->verifie("https://example.com");
        $this->assertEquals("Cet Url est valide !", $validator->getMsgInfo());
    }
}
