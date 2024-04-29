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
 * Tous validateurs doivent être capables de :
 *  - vérifier leur contrainte
 *  - de renvoyer la donnée qu'ils ont en charge
 *  - d'informer leur état {vide, valide, erreur}
 */
interface ValidatorInterface
{
    /**
     * Effectue la validation sur la donnée
     * Enregistre la donnée
     * Fixe l'état
     *
     * @param mixed $value // La donnée à valider
     *
     * @return bool
     */
    public function verifie($value);

    /**
     * Doit retourner la donnée enregistrer ou null sinon
     *
     * @return mixed
     */
    public function getData();

    /**
     * Doit renvoyer une chaîne de caractère indiquant
     * en fonction des cas
     *  - que tout va bien
     *  - qu'il y a une erreur
     *  - rien si il n'y a pas de donnée
     *
     * @return null|string
     */
    public function getMsgInfo();

    /**
     * Traduit un message si la donnée est valide
     *
     * @param string $msg
     *
     * @return null
     */
    public function ifOk($msg);

    /**
     * Traduit un message si la donnée n'est pas valide
     *
     * @param string $msg
     *
     * @return null
     */
    public function ifNoOk($msg);
}
