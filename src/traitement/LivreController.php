<?php

class LivreController
{
    public function getLivreByName($name){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM livre WHERE titre LIKE ':nom%'");
        $requ->execute(array('nom' => $name));
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

}