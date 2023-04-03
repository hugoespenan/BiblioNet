<?php

include("src/vue/head.php");
include("src/traitement/Inscrit.php");
include("src/vue/login.php");
include("src/traitement/Admin.php");
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet ConnexionADM</title>
</head>
<body>


<div class="container">
    <?php
    include("adminpage1.php");
    ?>
</div>


<div class="row">
    <div class="col-lg-12">


        <?php if ($_SESSION['admin'] == false
        ){


            ?>

            <?php }

            if ($_SESSION['admin'] == true) {
            $admin = new Admin();
            try {
                if (1) {
                    $admin->listerInscrit();
                    ?>
                    <form action="gestionuser.php" method="post">
                        <th scope="col">
                            <input name="crea" type="submit" class="btn btn-outline-primary" value="Ajouter"></input>
                            <input name="modif" type="submit" class="btn btn-outline-primary" value="Modification"></input>
                            <input name="supp" type="submit" class="btn btn-outline-primary" value="Supprimer"></input>
                        </th>
                    </form>
                <?php


                if (isset($_POST['crea'])) {

                ?>
                    <form action="gestionuser.php" method="post">
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
                                <td><input type="password" name="mdpinsc" id="mdp" placeholder="Mot de passe" required></td>
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
                                <td><input name="incr" type="submit" value="Inscrire"/><input type="reset" value="Effacer"/></td>
                            </tr>
                        </table>
                    </form>


                <?php

                if(isset($_POST['inscr'])){
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

    </div>
</div>
</body>
</html>