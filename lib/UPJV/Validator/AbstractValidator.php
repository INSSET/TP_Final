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
 * Code commun à tous les validateurs
 */
abstract class AbstractValidator implements ValidatorInterface
{
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation
     * Le nombre de caractères minimum par défaut 3
     */
    public function __construct()
    {
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Renvoi le message tel que si la donnée est valide
     *
     * @param string $msg
     *
     * @return null
     */
    public function ifOk($msg)
    {
        return ( $this->flag === true ? $msg : null );
    }

    /**
     * Renvoi le message tel que si la donnée est valide
     *
     * @param string $msg
     *
     * @return null
     */
    public function ifNoOk($msg)
    {
        return ( $this->flag === false ? $msg : null );
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
     * A implémenter
     *
     * @inheritDoc
     */
    abstract public function verifie($value);

    /**
     * A implémenter
     *
     * @inheritDoc
     */
    abstract public function getMsgInfo();
}
