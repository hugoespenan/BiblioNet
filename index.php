<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
require_once 'src/traitement/LivreController.php';


if (isset($_SESSION['connecter'])) {
    if (isset($_GET['d'])) {
        session_destroy();
        $_SESSION['connecter'] = false;
    }
}

if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false;


if (!empty($_POST['email']) and !empty($_POST['mdp'])) {
    $inscrit1 = new Inscrit();

    if ($inscrit = $inscrit1->connexion($_POST['email'], $_POST['mdp'])) {

        $_SESSION['connecter'] = true;
        foreach ($inscrit as $client_connecter) {

            $_SESSION['id_client'] = $client_connecter['id_client'];
            $_SESSION['nom'] = $client_connecter['nom'];
            $_SESSION['prenom'] = $client_connecter['prenom'];
            $_SESSION['email'] = $client_connecter['email'];
            $_SESSION['telephone'] = $client_connecter['telephone'];
            $_SESSION['adresse'] = $client_connecter['adresse'];
            $_SESSION['mdp'] = $client_connecter['mdp'];
            $_SESSION['cp'] = $client_connecter['cp'];
            $_SESSION['ville'] = $client_connecter['ville'];
        }

    } else {

        ?>
        <script type="text/javascript"> window.alert('email ou mot de passe incorrect! ');</script>
        <?php

    }
}

include("src/vue/login.php");
include("src/vue/header.php");
$bh = 0;
$z = 0;
?>
<body xmlns="http://www.w3.org/1999/html">

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/index.php">
                        <img src="assets/img/BiblioNet.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>


                        <li class="active"><a href="index.php">Acceuil</a></li>
                        <?php

                        if (!$_SESSION['connecter']) {
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

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Auteurs</span>
                    </div>
                    <ul>
                        <?php
                        $filtre = "";
                        $auteurcontr = new AuteurController();
                        foreach ($auteurcontr->afficherAuteurs() as $item) {
                            ?>
                            <li>
                                <a href="index.php?filtre=<?php echo $item['nom'] ?>#ancre"><?php echo $item['prenom'] . " " . $item['nom'] ?></a>
                            </li>
                            <?php
                            if (isset($_GET['filtre'])) {
                                if ($_GET['filtre'] == $item['nom']) {
                                    $filtre = $item['nom'];
                                    $bh = 1;
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#ancrerecherche" method="post">
                            <input type="text" name="recherche" placeholder="Quel livre cherchez vous ?">
                            <button type="submit" name="valider" class="site-btn">RECHERCHER</button>
                        </form>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="">
                    <img src="assets/img/imageAcceuil.png">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<?php
$livrecontr = new LivreController();
?>
<!-- Categories Section Begin -->

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nos livres</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                <?php
                foreach ($livrecontr->getLivres() as $item2) {
                    ?>
                    <div class="col-lg-3">
                        <?php $image_blob = base64_encode($item2['image']);
                        ?>
                        <a href="afficherlivre.php?titre=<?php echo $item2['titre'] ?>"><img onclick="clicked()"
                                                                                             src="data:image/jpeg;base64,<?php echo $image_blob; ?>"
                                                                                             alt="image"></a>
                        <center><?php echo '<b>' . $item2['titre'] . '</b>'; ?></center>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <div id="ancre" class="col-lg-3 col-md-4 col-sm-6">
        <div class="featured__item">
            <div class="featured__item__text">
                <h6><a href="#"><br><br><br><br><br><br></a></h6>
            </div>
        </div>
    </div>
    </div>
</section>
<br><br><br><br><br>
<!-- Categories Section End -->
<!-- Featured Section Begin -->
<?php
if ($bh == 1) {
    ?>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Livre de <?php echo $filtre ?> : </h2>
                    </div>
                </div>
                <div class="categories__slider owl-carousel">
                    <?php
                    foreach ($auteurcontr->getLivreByAuteur($auteurcontr->getIdAuteurByName($filtre)) as $item) {
                        ?>
                        <div class="col-lg-3">
                            <?php $image_blob = base64_encode($item['image']);
                            ?>
                            <a style="color: black" href="afficherlivre.php?titre=<?php echo $item['titre'] ?>"><img
                                        src="data:image/jpeg;base64,<?php echo $image_blob; ?>" alt="image">
                                <center><?php echo '<b>' . $item['titre'] . '</b>'; ?></center>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <div id="ancre" class="col-lg-3 col-md-4 col-sm-6">
            <div class="featured__item">
                <div class="featured__item__text">
                    <h6><a href="#"><br><br><br><br><br><br></a></h6>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
}
?>
<?php
if (isset($_POST['valider']) and isset($_POST['recherche'])) {
    ?>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="ancrerecherche" class="section-title">
                        <h2>Résultats de votre recherche</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="categories__slider owl-carousel">
                    <?php
                    foreach ($livrecontr->getLivreByName($_POST['recherche']) as $item) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="col-lg-3">
                                <?php $image_blob = base64_encode($item['image']);
                                ?>
                                <a style="color: black" href="afficherlivre.php?titre=<?php echo $item['titre'] ?>"><img
                                            src="data:image/jpeg;base64,<?php echo $image_blob; ?>" alt="image">
                                    <center><?php echo '<b>' . $item['titre'] . '</b>'; ?></center>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
}
?>
<!-- Featured Section End -->
<!-- Js Plugins -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/mixitup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>