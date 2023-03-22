<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="header__top__right">
                    <div class="header__top__right__auth">

                        <?php
                        if (!$_SESSION['connecter']){
                        ?>
                        <form method="post" action="">
                            <input type="text" name="email" placeholder="Adresse-mail" required/>
                            <input type="password" name="pwd" placeholder="Mot de Passe" required/>
                            <input type="submit" value="Se connecter"/>
                        </form>
                    </div>
                </div>
                <?php
                }else {

                    ?>

                    <div class="col-lg-7">
                    </div>
                    <div class="col-lg-5">
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#">Profile</a></li>
                            <li><a href="index.php?d=true">Deconnecter</a></li>

                        </ul>

                    </div>
                    <?php

                }

                ?>
            </div>
        </div>
    </div>
</div>