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
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="tableau">


                <div class="panel panel-default">
                    <div class="panel-body">

                    </div>

                    <table class="table">


                        <tr>
                            <th>Réference</th>
                            <th>Titre</th>
                            <th>Annee</th>
                            <th>Date Emprunt</th>
                            <th>Date de retour</th>
                        </tr>


                        <?php
                        $inscrit = new Inscrit();
                        $resultat = $inscrit->empruntUtilisateur($_SESSION['id_inscrit']);
                        foreach ($resultat as $emprunt) {

                            $date_emprunt = $emprunt['date'];
                            $date_retour = 8;
                            $dateDebut = date("$date_emprunt");

                            // Calculer la date de retour en ajoutant $date_retour jours à la date d'emprunt, puis la stocker dans la variable $date_retour
                            $date_retour = date('Y-m-d', strtotime($dateDebut . ' +' . $date_retour . ' days'));

                            echo "<tr>" .
                                "<td>" . $emprunt['id_livre'] .
                                "</td><td>" . $emprunt['titre'] .
                                "</td><td>" . $emprunt['annee'] .
                                "</td><td>" . $emprunt['date'] .
                                "</td><td>" . $date_retour .
                                "</td>" .
                                "</tr>";
                        }
                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

