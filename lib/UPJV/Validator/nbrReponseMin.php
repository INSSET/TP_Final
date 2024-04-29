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
 *  - x fixé par la méthode setMin
 *  - x = 3 par défaut (3 caractères minimum)
 */
class nbrReponseMin extends AbstractValidator
{
    /**
     * Class Min implémente les méthode build & check
     */
    protected $min;
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de caractères minimum par défaut 3
     */
    public function __construct()
    {
        parent::__construct();
        $this->min = 3;
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Permet de fixer un autre nombre de caractère minimum
     *
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;
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
        $nbRep = 1;
        for($i =0;$i<strlen($value);$i++){
            if($value[$i]==','){
                $nbRep +=1;
            }
        }
        if ($nbRep < $this->min) {
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
            return "Le nombre de réponse est inférieur à " . $this->min;
        }
        if ($this->flag === true) {
            return "C'est tout bon !";
        }
        if ($this->flag === null) {
            return "Nombre minimal de réponse demandé : " . $this->min;
        }
    }
}
