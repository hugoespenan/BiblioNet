<?php

class LivreController
{
    public function getLivreByName($name){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM livre WHERE titre LIKE :nom");
        $requ->execute(array('nom' => $name.'%'));
        $res = $requ->fetchAll();
        return $res;
    }
    public function getImageByLivre($id_livre){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT image FROM livre WHERE id_livre = :id");
        $requ->execute(array('id' => $id_livre));
        $res = $requ->fetch();
        return $res['image'];
    }
    public function getLivres(){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->query("SELECT * FROM livre");
        $res = $requ->fetchAll();
        return $res;
    }
    public function getRefExemplaire($id_livre, $id_edition){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT id_exemplaire FROM exemplaire WHERE ref_livre = :ref_livre and ref_edition = :ref_edition");
        $requ->execute(array('ref_livre' => $id_livre, 'ref_edition' => $id_edition));
        $res = $requ->fetch();
        return $res['id_exemplaire'];
    }
    public function getNombreEditionByLivre($id_livre){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT DISTINCT ref_edition FROM exemplaire WHERE ref_livre = :ref_livre");
        $requ->execute(array('ref_livre' => $id_livre));
        $res = $requ->fetchAll();
        return $res;
    }
    public function getNomEdition($id_edition){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM edition WHERE id_edition = :ref_edition");
        $requ->execute(array('ref_edition' => $id_edition));
        $res = $requ->fetch();
        return $res['nom'];
    }
    public function getIdByName($name){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT id_edition FROM edition WHERE nom = :nom");
        $requ->execute(array('nom' => $name));
        $res = $requ->fetch();
        return $res['id_edition'];
    }
    public function getExemplaire($ref_livre, $ref_edition){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT id_exemplaire FROM exemplaire WHERE ref_livre = :ref_livre and ref_edition =:ref_edition");
        $requ->execute(array('ref_livre' => $ref_livre, 'ref_edition' => $ref_edition));
        $res = $requ->fetch();
        return $res['id_exemplaire'];
    }
}