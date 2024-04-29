<?php

/**
 * PHP version 8.2.10
 * Déclaration des savoirs faire pour chaque validator.
 *
 * @category Bibliotheque
 *
 * @package Validator
 *
 * @author [Ton nom]
 *
 * @license gnu https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link [Lien de référence]
 */

namespace UPJV\Validator;

/**
 * Vérifie si la chaîne est une URL valide.
 */
class UrlValidator extends AbstractValidator
{
    protected $data;
    protected $flag;

    /**
     * Initialise les variables d'instance, pas de donnée, pas de résultat de validation.
     */
    public function __construct()
    {
        parent::__construct();
        $this->flag = null;
        $this->data = null;
    }

    /**
     * Vérifie si la chaîne est une URL valide.
     *
     * @param string $value la valeur à tester
     *
     * @return bool renvoie faux si le test ne passe pas
     */
    public function verifie($value)
    {
        $this->data = $value;
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return $this->flag = false;
        }

        return $this->flag = true;
    }

    /**
     * Getter sur la donnée enregistrée.
     *
     * @return null|string renvoie la donnée testée
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * En fonction de l'état du test renvoie rien | une erreur | la condition.
     *
     * @return string|void
     */
    public function getMsgInfo()
    {
        if ($this->flag === false) {
            return "La chaîne n'est pas une URL valide.";
        }
        if ($this->flag === true) {
            return "Cet Url est valide !";
        }
        if ($this->flag === null) {
            return "Veuillez fournir une URL valide.";
        }
    }
}
