<?php

class Livre
{

    private static $titre;
    private static $resume;
    private static $annee;
    private static $id;

    /**
     * @return mixed
     */
    public static function getTitre()
    {
        return self::$titre;
    }

    /**
     * @param mixed $titre
     */
    public static function setTitre($titre)
    {
        self::$titre = $titre;
    }

    /**
     * @return mixed
     */
    public static function getResume()
    {
        return self::$resume;
    }

    /**
     * @param mixed $resume
     */
    public static function setResume($resume)
    {
        self::$resume = $resume;
    }

    /**
     * @return mixed
     */
    public static function getAnnee()
    {
        return self::$annee;
    }

    /**
     * @param mixed $annee
     */
    public static function setAnnee($annee)
    {
        self::$annee = $annee;
    }

    /**
     * @return mixed
     */
    public static function getId()
    {
        return self::$id;
    }

    /**
     * @param mixed $id
     */
    public static function setId($id)
    {
        self::$id = $id;
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $cle => $valeur) {
            $methode = 'set'.ucfirst($cle);
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }



}