<?php
include("src/vue/head.php");
?>

<li class="active"><a href="/index.php">Acceuil</a></li>
<li><a href="inscription.php">Inscription</a></li>
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
                        <li><a href="">Victor Hugo</a></li>
                        <li><a href="#">Jean-Paul Sartre</a></li>
                        <li><a href="#">Sébastien Lemoine</a></li>
                        <li><a href="#">Emile Zola</a></li>
                        <li><a href="#">Jules Verne</a></li>
                        <li><a href="#">Guy De Maupassant</a></li>
                        <li><a href="#">Albert Camus</a></li>
                        <li><a href="#">Adolf Hitler</a></li>
                        <li><a href="#">Echiiro Oda</a></li>
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