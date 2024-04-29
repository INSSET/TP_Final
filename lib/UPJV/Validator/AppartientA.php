<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author Abdelmouez <abdelmouez.memmi@gmail.com>
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://pedag.u-picardie.fr/moodle/upjv/course/view.php?id=308#section-0
 */

namespace UPJV\Validator;

/**
 * Vérifie que si c'est la meme expression
 */
class AppartientA extends AbstractValidator
{
    /**
     * Class Min implémente les méthode build & check
     */
    protected $expression;
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * L'expression est détecté
     */
    public function __construct()
    {
        parent::__construct();
        $this->expression = "detecte";
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Test l'expression
     * et stock la donnée pris en charge dans data
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoi faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if (preg_match("/".$this->expression."/i", $value)) {
            return $this->flag = true;
        }

        return $this->flag = false;
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
            return "L'expression doit être " . $this->expression;
        }
        if ($this->flag === true) {
            return "C'est tout bon !";
        }
        if ($this->flag === null) {
            return "L'expression est : " . $this->expression;
        }
    }
}
