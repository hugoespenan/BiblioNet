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
        $c = $cobdd->b->query("SELECT * FROM inscrit ");?>
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
            echo "<td>" . $resultat['rue'] . " ".$resultat['cp']." ".$resultat['ville']. "</td>";
            echo "</tr>";
        }
        ?>
    </table> <?php

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


    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}