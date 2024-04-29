<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author Armand
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://pedag.u-picardie.fr/moodle/upjv/course/view.php?id=308#section-0
 */

namespace UPJV\Validator;

/**
 * Vérifie que la chaîne donnée est la même que demandé
 *  - x fixé par la méthode setmot
 *  - x = verte par défaut
 */
class IdentA extends AbstractValidator
{
    /**
     * Class IdentA implémente les méthode build & check
     */
    protected $mot;
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de caractères minimum par défaut 3
     */
    public function __construct()
    {
        parent::__construct();
        $this->mot = "verte";
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Permet de fixer un autre mot de conf
     *
     * @param int $mot
     */
    public function setmot($mot)
    {
        $this->mot = $mot;
    }

    /**
     * Test la chaîne fournit ainsi que le mode demandé
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoi faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if ($value === $this->mot) {
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
            return "Le mot rentré n'est pas " . $this->mot;
        }
        if ($this->flag === true) {
            return "La couleur des pommes";
        }
        if ($this->flag === null) {
            return "mot demandé  : " . $this->mot;
        }
    }
}
