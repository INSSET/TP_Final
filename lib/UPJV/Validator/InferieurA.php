<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author Tom <tom.vesleau1@gmail.com>
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://pedag.u-picardie.fr/moodle/upjv/course/view.php?id=308#section-0
 */

namespace UPJV\Validator;

/**
 * Vérifie que la taille de la chaine comporte au moins x caractères
 *  - x fixé par la méthode setInfA
 *  - x = 10 par défaut 
 */
class InferieurA extends AbstractValidator
{
    /**
     * Class InferieurA implémente les méthode build & check
     */
    protected $numberRef;
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de référence par défaut est 10
     */
    public function __construct()
    {
        parent::__construct();
        $this->numberRef= 10;
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Permet de fixer un autre nombre de référence
     *
     * @param int $numberRef 
     */
    public function setInfA($numberRef)
    {
        $this->numberRef = $numberRef;
    }

    /**
     * Test si nombre entré est inférieur à la référence
     * et stock la donnée pris en charge dans data
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoi faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if ($value >= $this->numberRef) {
            return $this->flag = false;
        }

        return $this->flag = true;
    }

    /**
     * Getter sur la donnée enregistrée
     *
     * @return null|string renvoi la donnée testée
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * En fonction de l'état du test renvoi rien | une erreur | la condition
     *
     * @return string|void
     */
    public function getMsgInfo()
    {
        if ($this->flag === false) {
            return "C PO BIEN CAR NOMBRE ENTRÉ SUPÉRIEUR OU ÉGAL À " . $this->numberRef;
        }
        if ($this->flag === true) {
            return "C'est goude car votre valeur est inférieur à  ". $this->numberRef."!";
        }
        if ($this->flag === null) {
            return "Nombre de référence pour comparer : " . $this->numberRef;
        }
    }
}
