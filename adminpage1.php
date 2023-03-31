<?php
include("src/vue/head.php");
include("src/traitement/Inscrit.php");
include("src/vue/login.php");
include("src/traitement/Admin.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet</title>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="header__logo">
                <a href="index.php">
                    <img src="assets/img/BiblioNet.png" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-7">
            <nav class="header__menu text-center">

                <h3>Interface Administrateur</h3>

            </nav>
        </div>
    </div>

    <form method="post" action="adminpage1.php">
        <div class="d-grid gap-2 col-7 mx-auto">
            <button name="user" class="btn btn-outline-success" type="submit">Gestion Utilisateurs</button>
            <button class="btn btn-outline-success" type="submit">Gestion Livres</button>
            <button class="btn btn-outline-success" type="submit">Gestion Emprunts</button>
            <button name="deco" class="btn btn btn-primary" type="submit">Deconnexion</button>
        </div>
    </form>
    <?php

    if (isset($_POST['deco'])) {
        $_SESSION['admin'] = false;
        header("location: adminlogin.php");
    }
    ?>

    <?php
    if (isset($_POST['user'])) {

        $admin = new Admin();
        try {
            if (1) {
                $admin->listerInscrit();
                ?>
                <form action="adminpage1.php" method="post">
                    <th scope="col">
                        <input name="crea" type="submit" class="btn btn-success" value="Ajouter">
                        <input name="modif" type="submit" class="btn btn-secondary" value="Modification">
                        <input name="supp" type="submit" class="btn btn-danger" value="Supprimer">
                    </th>
                </form>
            <?php
            if (isset($_POST['crea'])) {
            ?>
                <form action="adminpage1.php" method="post">
                    <table class="login_table">

                        <tr>
                            <td>Nom<span>*</span></td>
                            <td><input type="text" name="nom" id="nom" placeholder="Nom" required></td>
                        </tr>
                        <tr>
                            <td>Prenom<span>*</span></td>
                            <td><input type="text" name="prenom" id="prenom" placeholder="Prenom" required></td>
                        </tr>

                        <tr>
                            <td>Email<span>*</span></td>
                            <td><input type="email" name="emailinsc" id="email" placeholder="Email" required></td>
                        </tr>

                        <tr>
                            <td>Mot de passe<span>*</span></td>
                            <td><input type="password" name="mdpinsc" id="mdp" placeholder="Mot de passe" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Telephone<span>*</span></td>
                            <td><input type="text" name="telephone" id="telephone" placeholder="Telephone Portable"
                                       required></td>
                        </tr>

                        <tr>
                            <td>Adresse<span>*</span></td>
                            <td><input type="text" name="rue" id="rue" placeholder="Adresse" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Code Postale<span>*</span></td>
                            <td><input type="text" name="cp" id="cp" placeholder="Code Postale (ex:93300)" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Ville<span>*</span></td>
                            <td><input type="text" name="ville" id="ville" placeholder="Ville" required>
                            </td>
                        </tr>

                        <tr>
                            <td><input name="incr" type="submit" value="Inscrire"/><input type="reset"
                                                                                          value="Effacer"/></td>
                        </tr>
                    </table>
                </form>


            <?php

            if (isset($_POST['inscr'])){
            $inscrit = new Inscrit();

            {
            if (1)
            {
            $inscrit->inscription($_POST['nom'], $_POST['prenom'], $_POST['emailinsc'], $_POST['mdpinsc'], $_POST['telephone'], $_POST['rue'], $_POST['cp'], $_POST['ville']); ?>
                <script type="text/javascript"> window.alert('Votre compte a ete crée !');</script>
                <?php
            }
            }
            }

            }

            } else {
                throw new Exception("Un probleme s'est produit lors du chargement des inscrits...");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }
    ?>


</div>
</body>
</html>