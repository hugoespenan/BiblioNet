<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
include("src/vue/login.php");
include("src/vue/header.php");
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="assets/img/BiblioNet.png" alt="">
                    </a>
                </div>
                <nav class="header__menu">
                    <ul>
                        <li><a href="profil.php">Mon compte</a></li>
                        <li class="active"><a href="emprunt.php">Mes emprunts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
</header>

