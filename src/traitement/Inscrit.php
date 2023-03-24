<?php
require_once __DIR__ . '/../bdd/bdd.php';

class Inscrit
{
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $tel_portable;
    private $rue;
    private $cp;
    private $ville;
    private $id;


    public function __construct()
    {
    }


    public function connexion($email, $mdp)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT * FROM inscrit WHERE email = :email AND mdp = :pwd");
        $c->execute(array('email' => $email, 'pwd' => $mdp));
        if($data = $c->fetch()){
            $inscrit[] = $data;
            return $inscrit;
        }else{
            return false;
        }
    }



    public function inscription($nom, $prenom, $email, $mdp, $tel_portable, $rue, $cp, $ville)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $dist = $cobdd->b->prepare("SELECT * FROM inscrit WHERE email = :email");
        $dist->execute(array('email' => $email));
        $res = $dist->fetchAll();
        if (empty($res)) {
            $c = $cobdd->b->prepare("INSERT INTO inscrit (nom, prenom, email, mdp, tel_portable, rue, cp, ville) VALUES (:nom, :prenom, :email, :mdp, :tel_portable, :rue, :cp, :ville)");
            $c->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'mdp' => $mdp,
                'tel_portable' => $tel_portable,
                'rue' => $rue,
                'cp' => $cp,
                'ville' => $ville,
                ));
        }
    }

    public function updateUtilisateur($id_inscrit, $nom, $prenom, $email, $mdp, $tel_portable, $rue, $cp, $ville)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $dist = $cobdd->b->prepare("SELECT * FROM inscrit WHERE email = :email AND id_inscrit != :id_inscrit");
        $dist->execute(array('email' => $email, 'id_inscrit' => $id_inscrit));
        $res = $dist->fetchAll();
        if (empty($res)) {
            $c = $cobdd->b->prepare("UPDATE inscrit SET nom=:nom, prenom=:prenom, email=:email, mdp=:mdp, tel_portable=:tel_portable, rue=:rue, cp=:cp, ville=:ville WHERE id_inscrit=:id_inscrit");
            $c->execute(array(
                'id_inscrit' => $id_inscrit,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'mdp' => $mdp,
                'tel_portable' => $tel_portable,
                'rue' => $rue,
                'cp' => $cp,
                'ville' => $ville));
        }
    }

}