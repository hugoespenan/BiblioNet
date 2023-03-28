<?php

class Emprunt
{
    private $date;
    private $delais;
    private $ref_exemplaire;
    private $ref_inscrit;

    public function Emprunter($date, $delais, $ref_exemplaire, $ref_inscrit){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("INSERT INTO emprunt(date, delais, ref_exemplaire, ref_inscrit) VALUES (:date, :delais, :ref_e, :ref_i)");
        $requ->execute(array('date' => $date, 'delais' => $delais, 'ref_e' => $ref_exemplaire, 'ref_i' => $ref_inscrit));
    }

}