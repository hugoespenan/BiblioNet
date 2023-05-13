<?php

class EmpruntController
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
        $requ2 = $bdd->b->prepare("UPDATE exemplaire SET disponible = true WHERE exemplaire.id_exemplaire = :ref");
        $requ2->execute(array('ref' => $ref_exemplaire));
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
        if (!empty($res)) {
            $ret = $res['titre'];
        }
        return $ret;
    }

    public function getExemplaire($id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT exemplaire.id_exemplaire FROM emprunt LEFT JOIN exemplaire ON emprunt.ref_exemplaire = exemplaire.id_exemplaire WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $res = $requ->fetch();
        $ret = "";
        if (!empty($res)) {
            $ret = $res['id_exemplaire'];
        }
        return $ret;
    }

    public function NbJoursDepasse($id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT (CURRENT_DATE-DATE_ADD(emprunt.date, INTERVAL emprunt.delais DAY)) AS temps FROM emprunt WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $res = $requ->fetch();
        return $res['temps'];
    }

    public function rendreEmprunt($id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("DELETE FROM emprunt WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $requ2 = $bdd->b->query("UPDATE exemplaire LEFT JOIN emprunt ON emprunt.ref_exemplaire = exemplaire.id_exemplaire SET disponible = true WHERE emprunt.ref_exemplaire = id_exemplaire");
    }

    public function estDispo($id_livre, $id_edition)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM exemplaire WHERE ref_edition = :edit and ref_livre = :livre and disponible = true");
        $requ->execute(array('edit' => $id_edition, 'livre' => $id_livre));
        $res = $requ->fetchAll();
        $ret = false;
        if (!empty($res)) {
            $ret = true;
        }
        return $ret;
    }

    public function getAll()
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->query("SELECT id_emprunt, livre.titre AS titre, ref_inscrit AS inscrit, date, delais FROM emprunt LEFT JOIN exemplaire ON exemplaire.id_exemplaire = emprunt.ref_exemplaire LEFT JOIN livre ON exemplaire.ref_livre = livre.id_livre ORDER BY ref_inscrit;");
        $res = $requ->fetchAll();
        return $res;
    }

    public function deleteEmrunt($id_emprunt)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("DELETE FROM emprunt WHERE id_emprunt = :id");
        $requ->execute(array('id' => $id_emprunt));
        $requ2 = $bdd->b->query("UPDATE exemplaire LEFT JOIN emprunt ON emprunt.ref_exemplaire = exemplaire.id_exemplaire SET disponible = true WHERE emprunt.ref_exemplaire = id_exemplaire");
    }

    public function modifierEmprunt($id_emprunt, $newdelais, $newdate)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        if (!empty($id_emprunt)) {
            if (!empty($newdate)) {
                $requ1 = $bdd->b->prepare("UPDATE emprunt SET date = :new WHERE id_emprunt = :id");
                $requ1->execute(array('new' => $newdate, 'id' => $id_emprunt));
            }
            if (!empty($newdelais)) {
                $requ = $bdd->b->prepare("UPDATE emprunt SET delais = :new  WHERE id_emprunt = :id");
                $requ->execute(array('new' => $newdelais, 'id' => $id_emprunt));
            }
        }
    }

}