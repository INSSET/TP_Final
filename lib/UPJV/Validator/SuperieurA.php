<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author Melvin <melvin.pollier@u-picardie.fr>
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://pedag.u-picardie.fr/moodle/upjv/course/view.php?id=308#section-0
 */

namespace UPJV\Validator;

/**
 * Vérifie que la valeur est supérieur à x
 *  - x fixé par la méthode setValue
 *  - x = 10 par défaut
 */
class SuperieurA extends AbstractValidator
{
    /**
     * Class SuperieurA implémente les méthode build & check
     */
    protected $x;
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de caractères minimum par défaut 3
     */
    public function __construct()
    {
        parent::__construct();
        $this->x = 10;
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Permet de fixer un autre nombre
     *
     * @param int $x
     */
    public function setValue($x)
    {
        $this->x = $x;
    }

    /**
     * Test si la valeur est supérieur à x
     * et stock la donnée pris en charge dans data
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoi faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if ($value < $this->x) {
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
            return "La valeur est inférieur à " . $this->x;
        }
        if ($this->flag === true) {
            return "La valeur est supérieur à " . $this->x;
        }
        if ($this->flag === null) {
            return "Aucune valeur saisie";
        }
    }
}
