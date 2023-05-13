<?php

include ("Livre.php");
class Admin
{

    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $id;


    public function listerInscrit()
    {
        $cobdd = new bdd ("biblionet", "localhost", "", "root");
        $c = $cobdd->b->query("SELECT * FROM inscrit ");

        while ($data = $c->fetch()) {
            $inscrit[] = $data;
        }

        return $inscrit;
    }


    public function connexion($email, $mdp)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT * FROM admin WHERE email = :email AND mdp = :pwd");
        $c->execute(array('email' => $email, 'pwd' => $mdp));
        $res = $c->fetch();
        if ($res == true) {
            $_SESSION['admin'] = true;
        } else {
            ?>
            <script type="text/javascript"> window.alert('email ou mot de passe incorrect! ');</script>
            <?php
            $_SESSION['admin'] = false;


        }
    }


    public function listerSelectedInscrit($id)
    {
        $cobdd = new bdd ("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT * FROM inscrit WHERE id_inscrit = :id");
        $c->execute(array('id' => $id));

        while ($data = $c->fetch()) {
            $inscrit[] = $data;
        }

        return $inscrit;
    }

    public function listerEmprunt()
    {

    }

    public function listerLivre()
    {
        $livre = array();
        $cobdd = new bdd ("biblionet", "localhost", "", "root");
        $c = $cobdd->b->query("SELECT id_livre, titre FROM livre");
        $c->execute();

        while ($data = $c->fetch()) {
            $livre[] = $data;
        }

        return $livre;
    }


    public function ajoutUtilisateur($nom, $prenom, $email, $tel_portable, $rue, $cp, $ville)
    {


        $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $shfl = str_shuffle($comb);
        $pwd = substr($shfl, 0, 8);


        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT COUNT(*) FROM livre WHERE nom=:nom AND email=:email");
        $c->execute(array(
            'nom' => $nom,
            'email' => $email
        ));
        $result = $c->fetchColumn();
        if ($result == 0) {

            $c = $cobdd->b->prepare("INSERT INTO inscrit (nom, prenom, email,mdp, tel_portable, rue, cp, ville) VALUES (:nom, :prenom, :email, :mdp, :tel_portable, :rue, :cp, :ville)");
            $c->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'mdp' => $pwd,
                'tel_portable' => $tel_portable,
                'rue' => $rue,
                'cp' => $cp,
                'ville' => $ville,
            ));
        }
    }

    public function ajoutLivre($titre, $annee, $resume, $image)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT COUNT(*) FROM livre WHERE titre=:titre AND annee=:annee");
        $c->execute(array(
            'titre' => $titre,
            'annee' => $annee
        ));
        $result = $c->fetchColumn();
        if ($result == 0) {
            $c = $cobdd->b->prepare("INSERT INTO livre (titre,annee,resume,image) VALUES (:titre, :annee, :resume, :image)");
            $c->execute(array(
                'titre' => $titre,
                'annee' => $annee,
                'resume' => $resume,
                'image' => $image
            ));
        }

    }


    public function modifierLivre($id_livre, $titre, $annee, $resume)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE livre SET titre=:titre, annee=:annee, resume=:resume WHERE id_livre=:id_livre");
        $c->execute(array(
            'id_livre' => $id_livre,
            'titre' => $titre,
            'annee' => $annee,
            'resume' => $resume,
        ));
    }


    public function selectLivre($id_livre){
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT * FROM livre WHERE id_livre=:id_livre");
        $c->execute(array(
            'id_livre' => $id_livre));

        $livre = new Livre();
        while ($data = $c->fetch()) {
            $livre->hydrate($data);
            $livre->setTitre($data['titre']);
            $livre->setResume($data['resume']);
            $livre->setAnnee($data['annee']);
        }

        return $livre;
    }

    public function modifierNom($nom, $id)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET nom=:nom WHERE id_inscrit=:id;");
        $c->execute(array(
            'nom' => $nom,
            'id' => $id
        ));
        ?>
        <div class="alert alert-success" role="alert">
            Le nom de l'utilisateur a été modifier !
        </div><?php
    }

    public function modifierPrenom($iduser, $prenom)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET prenom=:prenom WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'prenom' => $prenom,
            'iduser' => $iduser
        ));
        ?>
        <div class="alert alert-success" role="alert">
            Le prenom de l'utilisateur a été modifier !
        </div><?php
    }

    public function modifierMail($iduser, $mail)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET mail=:mail WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'mail' => $mail,
            'iduser' => $iduser
        ));
        ?>
        <div class="alert alert-success" role="alert">
            Le mail de l'utilisateur a été modifier !
        </div><?php
    }

    public function modifierTel($iduser, $tel)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET tel_portable=:tel WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'tel' => $tel,
            'iduser' => $iduser
        ));
        ?>
        <div class="alert alert-success" role="alert">
            Le téléphone de l'utilisateur a été modifier !
        </div><?php
    }

    public function modifierRue($iduser, $rue)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET rue=:rue WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'rue' => $rue,
            'iduser' => $iduser
        ));
        ?>
        <div class="alert alert-success" role="alert">
            L'adresse de l'utilisateur a été modifier !
        </div><?php
    }

    public function modifierCP($iduser, $cp)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET cp=:cp WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'cp' => $cp,
            'iduser' => $iduser
        ));
        ?>
        <div class="alert alert-success" role="alert">
            Le code postale de l'utilisateur a été modifier !
        </div><?php

    }

    public function modifierVille($iduser, $ville)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET ville=:ville WHERE id_inscrit=:iduser;");
        $c->execute(array(
            'ville' => $ville,
            'iduser' => $iduser
        )); ?>
        <div class="alert alert-success" role="alert">
            La ville de l'utilisateur a été modifier !
        </div><?php
    }


    public function modifierUtilisateur($id_inscrit, $nom, $prenom, $email, $tel_portable, $rue, $cp, $ville)
    {

        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("UPDATE inscrit SET nom=:nom, prenom=:prenom, email=:email, tel_portable=:tel_portable, rue=:rue, cp=:cp, ville=:ville WHERE id_inscrit=:id_inscrit");
        $c->execute(array(
            'id_inscrit' => $id_inscrit,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel_portable' => $tel_portable,
            'rue' => $rue,
            'cp' => $cp,
            'ville' => $ville,
        ));
    }

    public function supprimerLivre($id_livre)
    {

        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("DELETE FROM livre WHERE id_livre = $id_livre");
        $c->execute();


    }

    public function supprimerUser($id_inscrit)
    {

        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("DELETE FROM inscrit WHERE id_inscrit = $id_inscrit");
        $c->execute();


    }


}