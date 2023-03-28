<?php
include("src/vue/head.php");
include("src/vue/header.php");
require_once 'src/traitement/AuteurController.php';
require_once 'src/traitement/Emprunt.php';
require_once 'src/traitement/LivreController.php';
?>
<body xmlns="http://www.w3.org/1999/html">


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


                        <li class="active"><a href="index.php">Acceuil</a></li>
                        <?php
                        if (!$_SESSION['connecter']) {//si connecter il n,affiche pas else il affiche
                            ?>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="reglement.php">Réglement</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <?php
                    if (isset($_GET['titre'])) {
                        $titre = $_GET['titre'];
                    }
                    ?>
                    <h2><?php echo $titre ?></h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="section-title">
                    <?php
                    $ac = new AuteurController();
                    $item = $ac->getLivreByTitre($titre);
                    $image_blob = base64_encode($item['image']);
                    ?>
                    <img src="data:image/jpeg;base64,<?php echo $image_blob; ?>" alt="image">
                    <?php echo '<br>' . '<b>' . $item['titre'] . '</b>' . '</br>' . '</br>' . $item['resume'] . '</br>' . '<br>' . " il est paru en " . '<b>' . $item['annee'] . '</b>' . '</br>' . '</br>' . '</br>'; ?>
                    <?php
                    if ($_SESSION['connecter'] == true) {
                        $livrec = new LivreController();
                        ?>
                        <form action="afficherlivre.php?titre=<?php echo $item['titre'] ?>#ptancre" method="post">
                            <select name="opt">
                                <?php
                                foreach ($livrec->getNombreEditionByLivre($item['id_livre']) as $value) {
                                    ?>
                                    <option><?php echo $livrec->getNomEdition($value['ref_edition']) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button style="border-color: black; color: black" name="bouton" class="form-control"><b>Emprunter</b>
                            </button>
                        </form>
                        <?php
                    }
                    $bb = 0;
                    if (isset($_POST['bouton'])) {
                        $emprunt = new Emprunt();
                        $date = date('Y-m-d');
                        if (isset($_POST['opt'])) {
                            $emprunt->Emprunter($date, 8, $livrec->getExemplaire($item['id_livre'], $livrec->getIdByName($_POST['opt'])), $_SESSION['id_inscrit']);
                            $bb = 1;
                        }
                    }
                    if ($bb == 1) {
                        ?>
                        <div id="ptancre" class="alert alert-success" role="alert">
                            Livre emprunté !
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</section>

