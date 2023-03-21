<?php
require_once __DIR__.'/../bdd/bdd.php';
class AuteurController
{

    public function afficherAuteurs(){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->query("SELECT * FROM auteur");
        $res = $requ->fetchAll();
        return $res;
    }
    public function getLivreByAuteur($id_auteur){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM livre LEFT JOIN ecrire ON ecrire.ref_livre = livre.id_livre WHERE ecrire.ref_auteur = :id");
        $requ->execute(array('id' => $id_auteur));
        $res = $requ->fetchAll();
        return $res;
    }
    public function getIdAuteurByName($name){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT id_auteur FROM auteur WHERE nom = :nom");
        $requ->execute(array('nom' => $name));
        $res = $requ->fetch();
        return $res['id_auteur'];
    }
    public function getImageByLivre($id_livre){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT image FROM livre WHERE id_livre = :id");
        $requ->execute(array('id' => $id_livre));
        $res = $requ->fetch();
        return $res['image'];
    }
     public function getNombreLivreByAuteur($id_auteur){
         $bdd = new bdd("biblionet", "localhost", "", "root");
         $requ = $bdd->b->prepare("SELECT COUNT(ref_livre) FROM ecrire WHERE ref_auteur = :id");
         $requ->execute(array('id' => $id_auteur));
         $res = $requ->fetchAll();
         return $res;
     }

}