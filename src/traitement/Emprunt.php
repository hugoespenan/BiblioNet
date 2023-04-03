<?php

class Emprunt
{
    private $date;
    private $delais;
    private $ref_exemplaire;
    private $ref_inscrit;

    public function Emprunter($date, $delais, $ref_exemplaire, $ref_inscrit)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("INSERT INTO emprunt(date, delais, ref_exemplaire, ref_inscrit) VALUES (:date, :delais, :ref_e, :ref_i)");
        $requ->execute(array('date' => $date, 'delais' => $delais, 'ref_e' => $ref_exemplaire, 'ref_i' => $ref_inscrit));
    }

    public function prolonger($nb_jours, $id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("UPDATE emprunt SET delais = delais+:nb_jours WHERE id_emprunt = :id");
        $requ->execute(array('nb_jours' => $nb_jours, 'id' => $id_emprunt));
    }

    public function getTitreLivre($id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT livre.titre FROM emprunt LEFT JOIN exemplaire ON exemplaire.id_exemplaire = emprunt.ref_exemplaire LEFT JOIN livre ON exemplaire.ref_livre = livre.id_livre WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $res = $requ->fetch();
        $ret = "";
        if (!empty($res)){
            $ret = $res['titre'];
        }
        return $ret;
    }
    public function getExemplaire($id_emprunt){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT exemplaire.id_exemplaire FROM emprunt LEFT JOIN exemplaire ON emprunt.ref_exemplaire = exemplaire.id_exemplaire WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $res = $requ->fetch();
        $ret = "";
        if (!empty($res)){
            $ret = $res['id_exemplaire'];
        }
        return $ret;
    }
    public function NbJoursDepasse($id_emprunt){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT (CURRENT_DATE-DATE_ADD(emprunt.date, INTERVAL emprunt.delais DAY)) AS temps FROM emprunt WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $res = $requ->fetch();
        return $res['temps'];
    }

}