<?php

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
        $c = $cobdd->b->query("SELECT * FROM inscrit "); ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Téléphone fixe</th>
                <th scope="col">Adresse</th>


            </tr>
            </thead>

            <?php
            $cobdd = new bdd("biblionet", "localhost", "", "root");
            $c = $cobdd->b->query("SELECT * FROM inscrit");
            $resultats = $c->fetchAll();
            foreach ($resultats as $resultat) {
                echo "<tr>";
                echo "<td>" . $resultat['nom'] . "</td>";
                echo "<td>" . $resultat['prenom'] . "</td>";
                echo "<td>" . $resultat['email'] . "</td>";
                echo "<td>" . $resultat['mdp'] . "</td>";
                echo "<td>" . $resultat['tel_portable'] . "</td>";
                echo "<td>" . $resultat['rue'] . " " . $resultat['cp'] . " " . $resultat['ville'] . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
        <?php

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


    public function ajoutLivre($titre, $annee, $resume, $image)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("INSERT INTO livre (titre,annee,resume,image) VALUES (:titre, :annee, :resume, :image)");
        $c->execute(array(
            'titre' => $titre,
            'annee' => $annee,
            'resume' => $resume,
            'image' => $image
        ));
    }


}