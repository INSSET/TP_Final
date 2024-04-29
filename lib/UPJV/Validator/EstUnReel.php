<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author Harold <harold.trannois@u-picardie.fr>
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://pedag.u-picardie.fr/moodle/upjv/course/view.php?id=308#section-0
 */

namespace UPJV\Validator;

/**
 * Vérifie que la taille de la chaine comporte au moins x caractères
 *  - x fixé par la méthode setReel
 *  - x = 3 par défaut (3 caractères minimum)
 */
class EstUnReel extends AbstractValidator
{
    /**
     * Class Reel implémente les méthode build & check
     */
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de caractères minimum par défaut 3
     */
    public function __construct()
    {
        parent::__construct();
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Test la longueur de la chaine de caractères
     * et stock la donnée pris en charge dans data
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoi faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if ($value.is_float()) {
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
            return "Le nombre n'est pas un reel " . $this->reel;
        }
        if ($this->flag === true) {
            return "C'est tout bon !";
        }
    }
}
