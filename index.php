<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
include("src/vue/login.php");
include ("src/vue/header.php");
?>

<body>


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

                        if (!$_SESSION['connecter']) {//si connecter il n,affiche pas else il affiche
                            ?>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="contact.php">Réglement</a></li>
                        <li><a href="contact.php">Bibliotèque</a></li>
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
                                <a href="index.php?filtre=<?php echo $item['nom'] ?>"><?php echo $item['prenom'] . " " . $item['nom'] ?></a>
                            </li>
                            <?php
                            if (isset($_GET['filtre'])) {
                                if ($_GET['filtre'] == $item['nom']) {
                                    $filtre = $item['nom'];
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
                        <form action="#">
                            <input type="text" placeholder="Que cherchez vous ?">
                            <button type="submit" class="site-btn">RECHERCHER</button>
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

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Livres Populaires</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="assets/img/categories/livre1.jpg"></div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="assets/img/categories/livre2.jpg"></div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="assets/img/categories/livre3.jpg"></div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="assets/img/categories/livre4.jpg"></div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="assets/img/categories/livre5.jpg"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Editions</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="assets/img/featured/gallimard.jpg">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Gallimard</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="assets/img/featured/pocket.jpg">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Pocket</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="assets/img/featured/lldp.jpg">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Le Livre de Poche</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="assets/img/featured/folio.jpg">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Folio Classique</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <div class="categories__item set-bg" data-setbg="<?php header("Content-type: image/jpg");
                        echo $item['image'] ?>"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="assets/img/featured/folio.jpg">
            </div>
            <div class="featured__item__text">
                <h6><a href="#">Folio Classique</a></h6>
            </div>
        </div>
    </div>
    </div>
</section>

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