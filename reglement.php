<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
include("src/vue/login.php");
include("src/vue/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet Inscription</title>
</head>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="assets/img/BiblioNet.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>


                        <li><a href="index.php">Acceuil</a></li>
                        <?php

                        if (!$_SESSION['connecter']) {
                            ?>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                        }
                        ?>
                        <li class="active"><a href="reglement.php">Réglement</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<body>
<div class="container align-content-center">
<div class="row">


    <div class="col-lg-12">

        <div class="panel panel-warning panel1">
            <div class="panel-body">
                <div id="reglement_ecrire">
                    <h2>Regles de pret</h2>
                    <ul>
                        <li>Tout adhérent a le droit d’emprunter 1 à 10 emprunts  des collections de la Bibliothèque pendant 8 jours ouvrables en plus d’un document de la Section romans .</li>
                        <li>La bibliothèque se réserve le droit d’exclure certains documents du prêt.</li>
                        <li>Tout retard sera sanctionné !</li>
                        <li>Tout document perdu ou abimé devra être remplacé ou remboursé.</li>
                    </ul>

                    <h2>Modalité de prêt</h2>
                    <ul>
                        <li>Pour toute opération de prêt, il faudra présenter une carte qui nous permettra de vous identifiez</li>
                        <li>La carte sera récupérée une fois le livre rendu.</li>
                    </ul>
                    <h2>Compte lecteur</h2>
                    <ul>
                        <li>Pour connaître la situation des prêts en cours, retards, amendes, etc., BiblioNet met à la disposition des adhérents un compte lecteur accessible sur la page d’accueil du catalogue de la bibliothèque.</li>
                    </ul>
                </div>
            </div>
        </div>
 </div>
</div>

</div>
</body>
</html>



