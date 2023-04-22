<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
require_once 'src/traitement/EmpruntController.php';
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
                            $oldDate = $emprunt['date'];
                            // Calculer la date de retour en ajoutant $date_retour jours à la date d'emprunt, puis la stocker dans la variable $date_retour
                            $date_retour = date("Y-m-d", strtotime($oldDate . '+ ' . $emprunt['delais'] . ' days'));
                            $dateDebut = date("$date_emprunt");
                            echo "<tr>" .
                                "<td>" . $emprunt['id_livre'] .
                                "</td><td>" . $emprunt['titre'] .
                                "</td><td>" . $emprunt['annee'] .
                                "</td><td>" . $emprunt['date'] .
                                "</td><td>" . $date_retour .
                                "</td><td>" . "<a href='emprunt.php?pro=$emprunt[id_emprunt]'><button class='form-control'>Prolonger</button></a>" .
                                "</td><td>" . "<a href='emprunt.php?ren=$emprunt[id_emprunt]'><button class='form-control'>Rendre</button></a>" .
                                "</td>" .
                                "</tr>";
                        }
                        ?>
                    </table>
                    <?php
                    if (isset($_GET['pro'])) {
                        ?>
                        <form method="post">
                            <select class="form-control" name="slct">
                                <?php
                                for ($i = 1; $i < 10; $i++) {
                                    ?>
                                    <option><?php echo $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input class="form-control" type="submit" name="valider">
                        </form>
                        <?php
                        if (isset($_POST['slct']) and $_POST['valider']) {
                            $em = new EmpruntController();
                            $em->prolonger($_POST['slct'], $_GET['pro']);
                            unset($_POST['slct']);
                            unset($_POST['valider']);
                            unset($_GET['pro']);
                            ?>
                            <script>
                                document.location.href="index.php";
                            </script>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_GET['ren'])) {
                        $em = new EmpruntController();
                        $em->rendreEmprunt($_GET['ren']);
                        unset($_POST['valider2']);
                        unset($_GET['ren']);
                        ?>
                        <script>
                            document.location.href="index.php";
                        </script>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

