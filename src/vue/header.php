<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="header__top__right">
                    <div class="header__top__right__auth">

                        <?php
                        if (!$_SESSION['connecter']) {
                            ?>
                            <form method="post" action="">
                                <input type="text" name="email" placeholder="Adresse-mail" required/>
                                <input type="password" name="pwd" placeholder="Mot de Passe" required/>
                                <input type="submit" value="Se connecter"/>
                            </form>
                            <?php
                        } else {

                            ?>
                            <div class="container">
<<<<<<< HEAD
                                    <div class="row">
                                    <div class="col-lg-5">
=======
                                <div class="row">
                                    <div class="col-lg-3">
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="adminpage.php"><i
                                                            class="fa-solid fa-screwdriver-wrench fa-xl"
                                                            style="color: #7fad39;"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3">
>>>>>>> 0c1acf79f7c3da0fa212a1757295dfdcddc642aa
                                        <ul class="nav nav-pills">
                                            <li class="active"><a href="profil.php"><i class="fa-solid fa-user fa-xl"
                                                                              style="color: #7fad39;"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-3">
                                        <ul class="nav nav-pills">
<<<<<<< HEAD
                                            <li class="active"><a href="index.php?d=true"><i class="fa-solid fa-power-off fa-xl"
                                                                              style="color: #7fad39;"></i>
=======
                                            <li class="active"><a href="index.php?d=true"><i
                                                            class="fa-solid fa-power-off fa-xl"
                                                            style="color: #7fad39;"></i>


>>>>>>> 0c1acf79f7c3da0fa212a1757295dfdcddc642aa
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <?php
                        }

                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>